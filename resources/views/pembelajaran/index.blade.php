@php ($count = 1)
@extends('layouts.sidebar')
@extends('layouts.layout')

@section('main')
<div style="padding-left: 5rem;">
    <div class="bg-[#2372D9] h-[4rem] fixed w-full top-0">
        <p class="text-white text-2xl pt-3 ml-10 font-bold">Pembelajaran</p>
    </div>
    <div class="flex items-center mt-16" style="height: 3.2rem; background-color: #EFEFEF;">
        @foreach($pelajaran as $data)
        <form id="dropdown" action="{{ route('pembelajaran.materi') }}">
            @csrf
            <div class="ml-6" data-dropdown-toggle="dropdownHover{{ $count }}" data-dropdown-trigger="hover">
                <button id="dropdownHoverButton{{ $count }}" class="menuButton text-black focus:outline-none text-lg font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center">{{ $data->nama }}</button>
                <input type="hidden" name="pelajaran" id="pelajaran" value="">
            </div>
        </form>
            <div id="dropdownHover{{ $count }}" class="menuDropdown z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <input type="hidden" name="materi" id="materi" value="">
                <ul class="ulDropDown py-2 text-sm text-gray-700" aria-labelledby="dropdownHoverButton{{ $count++ }}">
                    
                </ul>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center mt-10">
        <div id="isiPembelajaran" class="flex flex-col">
       
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.menuButton').click(function(e) {
            e.preventDefault();
        })

        $('.menuButton').on('mouseover', function() {         
            $('#pelajaran').val($(this).html())

            $.ajax({
                type: 'POST',
                url: $('#dropdown').attr('action'),
                data: new FormData(document.getElementById('dropdown')),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    var data = response.materi
                    var materi = "";

                    data.forEach(function(e) {
                        materi += '<li>\
                            <a class="block py-2 px-4 cursor-pointer text-center hover:bg-gray-100">'+e.materi+'</a>\
                        </li>'
                    })

                    $('.ulDropDown').html(materi);
                },
                error: function(err) {
                    $('.ulDropDown').html("");
                }
            })
        })

        $('.menuDropdown').on('click', 'li', function(e) {
            $('#materi').val($(this).children().html())
            
            $.ajax({
                type: 'GET',
                data: 'pelajaran=' + $('#pelajaran').val(),
                url: 'http://127.0.0.1:8000/pembelajaran/materi/' + $('#materi').val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    isi = '<form id="formTugas" class="mx-auto" action="http://127.0.0.1:8000/tugas/'+data.isi.id+'">\
                        <input type="hidden" value="'+data.isi.id+'">\
                        <button class="text-white bg-[#2372D9] hover:bg-blue-800 w-96 h-14 font-medium rounded-lg text-xl px-5 py-2.5 mr-2 mb-2 focus:outline-none">Tugas</button>\
                    </form>\
                    <div class="mx-auto mt-8 text-lg break-all px-64">\
                        <p class="text-center">'+data.isi.isi+'</p>\
                    </div>';

                    $('#isiPembelajaran').html(isi);
                }
            })
        })
    })
</script>
@endsection