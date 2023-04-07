@php ($count = 1)
@extends('layouts.sidebar')
@extends('layouts.layout')

@section('main')
<div class="pl-[5rem]">
    <div class="bg-[#2372D9] h-[4rem] fixed w-full top-0">
        <div>
            <p class="text-white text-2xl pt-3 ml-10 font-bold">Tugas</p>
        </div>
    </div>
    <div class="pb-14 h-full mt-20">
        @if(Auth::check())
        <div class="ml-10 mt-5">
            <div class="flex">
                <a href="{{ URL::previous() }}">
                    <img src="{{ asset('assets/left-arrow.png') }}"  alt="">                    
                </a>
                <div class="w-full">
                    <div class="mt-2 ml-14 text-xl font-bold flex space-x-[73%] ">
                        <p >{{ $dataTugas->judul }}</p>
                        <p>Batas : {{ $dataTugas->deadline }}</p>
                    </div>
                </div>
            </div>
            <div class="pl-[5.2rem] pr-52 mt-14 text-lg">
                <p>{{ $dataTugas->deskripsi }}</p>
            </div>
            @if(Auth::check())
            <div class="pl-[5.2rem] mt-16 h-full">
                @if($pengumpulan == NULL)
                <form action="{{ route('tugas.submitTugas') }}" method="POST" class="w-[95%] flex flex-col" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idTugas" value="{{ $dataTugas->id }}">
                    <input type="file" name="fileTugas" id="fileTugas" class="border-solid border-2 border-gray-200 rounded-lg p-4 w-[20%]" value="{{ $pengumpulan != NULL ? $pengumpulan->file : ''}}">
                    <button class="text-white w-[25%] mx-auto mt-[30%] bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl py-3 text-center">Kumpul</button>
                </form>
                @elseif($pengumpulan->nilai) 
                <p class="text-lg mt-10 font-bold">Nilai : {{ $pengumpulan->nilai }}</p>
                <p class="mt-1 text-lg">Catatan dari guru : {{ $pengumpulan->catatan }}</p>
                @else
                <p class="text-lg mt-10 font-bold">Sudah disubmit</p>
                @endif
            </div>
            @endif
        </div>
        @elseif(Auth::guard('guru')->id() == $tugas->kodeguru)
        <table class="min-w-full mt-10">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-blue-300">No</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-blue-300">NIS</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-blue-300">Nama</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-blue-300">File</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-blue-300">Tanggal Pengumpulan</th>
                                <th class="px-6 py-3 text-xs text-left uppercase leading-4 font-medium tracking-wider text-gray-500 border-b border-gray-200 bg-blue-300" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($dataPengumpulan as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        {{ $count++ }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data->nisSiswa }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data->siswa->nama }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <embed src="{{ url('storage/'.$data->fileTugas) }}" type="">
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data->tanggal_pengumpulan }}
                                </td>
                                <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200">
                                    <button type="submit" id="editData" class="flex items-center" data-modal-target="detail-modal" data-modal-toggle="detail-modal" data-id="{{ $data->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600 hover:text-indigo-900 focus:outline-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </td>      
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="detail-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-xl md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="ml-2 text-xl font-semibold text-gray-900" id="userCrudModal">Penilaian Guru</h3>
                <button type="button" class="text-gray-400 bg-transparent focus:outline-none rounded-lg text-sm p-1 ml-auto inline-flex items-center" data-modal-hide="detail-modal">
                    <svg aria-hidden="true" class="w-5 h-5 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-6 space-y-6">
                <form id="form-penilaian" action="{{ route('tugas.penilaian', $data->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nilai" class="block mb-2 text-sm font-medium text-gray-900">Nilai :</label>
                        <input type="number" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="nilai" placeholder="Nilai" name="nilai">
                    </div>
                    <div class="mb-4">
                        <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900">Catatan guru :</label>
                        <textarea name="catatan" rows="4" class="shadow aprrearance-none block p-3 w-full text-gray-700 rounded-lg border focus:outline-none focus:shadow-outline" id="catatan" placeholder="Catatan Guru"></textarea>
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
        @else
        <p>Hehe</p>
        @endif
    </div>
</div>
@endsection