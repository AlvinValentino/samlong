@extends('layouts.sidebar')
@extends('layouts.layout')

@section('main')
<div class="pl-[5rem]">
    <div class="bg-[#2372D9] h-[4rem] fixed w-full top-0">
        <div class="flex ml-10 space-x-[80%]">
            <p class="text-white text-2xl pt-3 font-bold">Buku Magang</p>
        </div>
    </div>
    <div class="border-2 w-[95%] mx-auto border-gray-300 mt-28 p-12 h-full pb-[22%]">
        <ul class="flex p-0 mb-44">
            <li class="page-item">
                <a href="{{ URL::previous() }}">
                    <img src="{{ asset('assets/left-arrow.png') }}" class="w-8" alt="">
                </a>
            </li>
            <li class="text-2xl ml-16" id="judulDevosi">
                <p>{{ $today }}</p>
            </li>
        </ul>
        <div>
            <form action="{{ route('magang.absen') }}" method="POST" id="form-absen">
                @csrf
                <p class="text-2xl">Keterangan pekerjaan :</p>
                <input type="hidden" name="status" value="Hadir">
                <input type="text" name="deskripsi" class="border-b mt-14 text-lg focus:outline-none w-[90%]">
                <button id="hadir" class="w-44 absolute bottom-0 mb-24 bg-[#3ED64D] hover:bg-green-500 focus:outline-none font-medium rounded-xl text-base py-1 px-6 text-center mx-auto">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#hadir').click(function(e) {
            e.preventDefault()

            $.ajax({
                type: 'POST',
                url: 'http://127.0.0.1:8000/magang/absenMagang',
                data: new FormData(document.getElementById('form-absen')),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function() {
                    window.location.href = 'http://127.0.0.1:8000/magang'
                }
            })
        })
    })
</script>
@endsection