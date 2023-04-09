@extends('layouts.sidebar')
@extends('layouts.layout')

@section('main')
<div class="pl-[5rem]">
    <div class="bg-[#2372D9] h-[4rem] fixed w-full top-0">
        <div class="flex ml-10 space-x-[80%]">
            <p class="text-white text-2xl pt-3 font-bold">Buku Magang</p>
        </div>
    </div>
    <div class="mt-28">
        @foreach($dates as $date)
        <div class="w-full">
            <div class="p-6 pl-10 mx-12 mt-6 rounded-lg border-solid border-2 border-gray-200 flex justify-between items-start">
                <p class="text-lg">{{ $date }}</p>
                <div class="flex space-x-4 mr-3">
                    @if($date == $today)
                    @if($absen == NULL)
                    <button id="hadir" class="w-full bg-[#3ED64D] hover:bg-green-500 focus:outline-none font-medium rounded-xl text-base py-1 px-6 text-center mx-auto" data-modal-target="status-modal" data-modal-toggle="status-modal">Hadir</button>
                    <button id="sakit" class="w-full bg-[#FCFF54] hover:bg-yellow-300 focus:outline-none font-medium rounded-xl text-base py-1 px-6 text-center mx-auto" data-modal-target="status-modal" data-modal-toggle="status-modal">Sakit</button>
                    <button id="izin" class="w-full bg-[#FCFF54] hover:bg-yellow-300 focus:outline-none font-medium rounded-xl text-base py-1 px-6 text-center mx-auto" data-modal-target="status-modal" data-modal-toggle="status-modal">Izin</button>
                    @else
                    <p class="text-gray-400">Sudah absen...</p>
                    @endif
                    @else
                    <p class="text-gray-400">Belum waktunya...</p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div id="status-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-hidden h-full">
    <div class="relative w-[50%] min-w-xl">
        <div class="relative rounded-lg shadow text-center bg-[#FFFEDC]">
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="ml-2 text-xl font-semibold text-black" id="userCrudModal">{{ $today }}</h3>
                <button type="button" class="bg-transparent focus:outline-none rounded-lg text-sm p-1 ml-auto inline-flex items-center" data-modal-hide="status-modal">
                    <svg aria-hidden="true" class="w-5 h-5 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form id="form-absen">
                <div class="p-10 space-y-6 mt-8" id="deskripsi">

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-8 pb-36 space-x-2 rounded-b" id="statusButton">

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#sakit').click(function() {
            $('#deskripsi').html('<p class="text-2xl">Keterangan sakit :</p>\
            <input type="text" id="deskripsi" name="deskripsi" class="border-b w-64 bg-[#FFFEDC] focus:outline-none">\
            <input type="hidden" name="status" id="status" value="Sakit">')

            $('#statusButton').html('<button class="bg-[#FCFF54] hover:bg-yellow-400 w-[24rem] focus:outline-none font-medium rounded-lg text-base py-3 text-center mx-auto" id="buttonStatus">Sakit</button>')

            $('#buttonStatus').click(function(e) {
                e.preventDefault();
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
                    success: function(data) {
                        console.log(data)
                    }
                })
            })
        })

        $('#izin').click(function() {
            $('#deskripsi').html('<p class="text-2xl">Konfirmasi kehadiran ?</p>\
                    <input type="hidden" name="status" id="status" value="Hadir">')

            $('#statusButton').html('<button class="bg-[#FCFF54] hover:bg-yellow-400 w-[24rem] focus:outline-none font-medium rounded-lg text-base py-3 text-center mx-auto" id="buttonStatus">Izin</button>')

            $('#buttonStatus').click(function(e) {
                e.preventDefault();
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
                        location.reload()
                    }
                })
            })
        })

        $('#hadir').click(function() {
            $('#deskripsi').html('<p class="text-2xl">Konfirmasi kehadiran ?</p>')

            $('#statusButton').html('<button class="bg-[#3ED64D] hover:bg-green-500 w-[24rem] focus:outline-none font-medium rounded-lg text-base py-3 text-center mx-auto" id="buttonStatus">Hadir</button>')

            $('#buttonStatus').click(function(e) {
                e.preventDefault()
                window.location.href = 'magang/detailPekerjaan'
            })
        })
    })
</script>
@endsection