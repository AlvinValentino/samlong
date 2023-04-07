@extends('layouts.sidebar')
@extends('layouts.layout')

@section('main')
<div class="pl-[5rem]">
    <div class="bg-[#2372D9] h-[4rem] fixed w-full top-0">
        <div class="flex ml-10 space-x-[80%]">
            <p class="text-white text-2xl pt-3 font-bold">Devosi</p>
            <input type="date" name="tanggal" id="tanggal" placeholder="Tanggal" class="ml-10 mt-[0.65rem] cursor-pointer shadow appearance-none border w-36 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline p-2 rounded">
        </div>
    </div>
    <div class="h-screen p-10 m-[2%] pt-14" id="dataDevosi">
        <div class="mt-10">
            <ul class="flex justify-between p-0 mb-10">
                <li class="page-item">
                <button aria-label="Previous" id="previous">
                    <img src="{{ asset('assets/left-arrow.png') }}" class="w-8" alt="">
                </button>
                </li>
                <li class="text-4xl font-bold" id="judulDevosi">
                    <h2>{{ $dataDevosi->judul }}</h2>
                </li>
                <li class="page-item">
                    <button aria-label="Next" id="next">
                        <img src="{{ asset('assets/right-arrow.png') }}" class="w-8" alt="">
                    </button>
                </li>
            </ul>
        </div>
        <div class="leading-normal break-words text-justify" id="teksDevosi">
            <p>{{ $teksDevosi }}</p>
        </div>
    </div>
<script>
    $(document).ready(function() {
        var fullDate = new Date();
        var twoDigitMonth = fullDate.getMonth()+1+"";if(twoDigitMonth.length==1)	twoDigitMonth="0" + twoDigitMonth;
        var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" + twoDigitDate;
        var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate;
        $('#tanggal').val(currentDate);

        $('#tanggal').change(function(e) {
            $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/devosi/showDevosiDate', 
                data: 'tanggal='+$('#tanggal').val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#tanggal').val(data.dataDevosi.tanggal)
                    $('#judulDevosi').html('<h2>'+data.dataDevosi.judul+'</h2>')
                    $('#teksDevosi').html('<p>'+data.teksDevosi+'</p>')
                }
            })
        })

        $('#previous').click(function(e) {
            $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/devosi/showDevosiDate', 
                data: 'tanggal='+$('#tanggal').val()+'&status=previous',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#tanggal').val(data.dataDevosi.tanggal)
                    $('#judulDevosi').html('<h2>'+data.dataDevosi.judul+'</h2>')
                    $('#teksDevosi').html('<p>'+data.teksDevosi+'</p>')
                }
            })
        })

        $('#next').click(function(e) {
            $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/devosi/showDevosiDate', 
                data: 'tanggal='+$('#tanggal').val()+'&status=next',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#tanggal').val(data.dataDevosi.tanggal)
                    $('#judulDevosi').html('<h2>'+data.dataDevosi.judul+'</h2>')
                    $('#teksDevosi').html('<p>'+data.teksDevosi+'</p>')
                }
            })
        })
    })
</script>
@endsection