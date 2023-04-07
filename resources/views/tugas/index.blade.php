@php ($count = 1)
@extends('layouts.sidebar')
@extends('layouts.layout')

@section('main')
<div style="padding-left: 5rem;">
    <div class="bg-[#2372D9] h-[4rem] fixed w-full top-0">
        <div style="background-color: #2372D9; height: 4rem;">
            <p class="text-white text-2xl pt-3 ml-10 font-bold">Tugas</p>
        </div>
    </div>
    <div class="mt-20 pb-14 h-full">
        <div class="w-10 ml-10 mt-5">
            <a href="{{ URL::previous() }}">
                <img src="{{ asset('assets/left-arrow.png') }}"  alt="">
            </a>
        </div>
        <div>
            @if($dataTugas == '[]')
                <div class="fixed top-[50%] left-[45%]">
                    <h1 class="text-4xl font-semibold">Tidak ada tugas :)</h1>
                </div>
            @else
                @foreach($dataTugas as $tugas)
                <div>
                    <form id="form-detail" action="{{ route('tugas.detailTugas', $tugas->judul) }}" method="GET">
                        @csrf
                        <button class="w-full" type="submit">
                            <input type="hidden" name="id" value="{{ $tugas->id }}">
                            <div class="p-6 pl-10 mx-12 mt-6 rounded-lg border-solid border-2 border-gray-200 flex justify-start flex-col items-start">
                                <p class="text-xl">{{ $tugas->judul }}</p>
                                <p class="text-gray-400">Batas : {{ $tugas->deadline }}</p>
                            </div>
                        </button>
                    </form>
                </div>
                @endforeach
            @endif
        </div>
        @if(Auth::guard('guru')->id() == $pembelajaran->kodeguru)
        <div class="fixed top-[83%] right-0 mr-14 mt-12 h-full">
            <button class="rounded-full flex justify-center items-center bg-gray-200 h-[3.7rem] w-[3.7rem]" data-modal-target="tugas-modal" data-modal-toggle="tugas-modal">
                <p class="text-2xl mb-1 font-bold">+</p>
            </button>
        </div>
        @endif
    </div>
</div>

<div id="tugas-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-xl md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="ml-2 text-xl font-semibold text-gray-900" id="userCrudModal">Tambah Tugas</h3>
                <button type="button" class="text-gray-400 bg-transparent focus:outline-none rounded-lg text-sm p-1 ml-auto inline-flex items-center" data-modal-hide="tugas-modal">
                    <svg aria-hidden="true" class="w-5 h-5 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-6 space-y-6">
                <form id="form-tugas" action="{{ route('tugas.store') }}">
                    <input type="hidden" id="method" value="store">
                    <input type="hidden" name="idPelajaran" value="{{ $pembelajaran->pelajaran->id }}">
                    <div class="mb-4">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul :</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="judul" placeholder="Judul" name="judul">
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi :</label>
                        <textarea name="deskripsi" rows="4" class="shadow aprrearance-none block p-3 w-full text-gray-700 rounded-lg border focus:outline-none focus:shadow-outline" id="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900">Deadline :</label>
                        <input type="datetime-local" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="deadline" name="deadline">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-8 space-x-2 rounded-b">
                    <button type="submit" class="text-white w-full bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base py-3 text-center mx-auto">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.menuButton').click(function(e) {
            e.preventDefault();
        })

        $('#form-tugas').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                data: new FormData(this),
                url: $('#form-tugas').attr('action'),
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
</script>
@endsection