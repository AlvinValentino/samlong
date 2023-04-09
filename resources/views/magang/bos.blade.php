@php ($count = 1)
@extends('layouts.sidebar')
@extends('layouts.layout')

@section('main')
<div class="pl-[5rem]">
    <div class="bg-[#2372D9] h-[4rem] fixed w-full top-0">
        <div class="flex ml-10 space-x-[80%]">
            <p class="text-white text-2xl pt-3 font-bold">Buku Magang</p>
        </div>
    </div>
    <div class="mt-24">
        <select id="siswa" class="bg-gray-50 border border-gray-300 focus:outline-none text-gray-900 text-sm rounded-lg block w-64 ml-4 p-2.5">
            <option value="{{ $siswa->nis }}" selected>{{ $siswa->nama }}</option>
            @foreach($daftarSiswa as $s)
            <option value="{{ $s->nis }}">{{ $s->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-10">
                    <table class="min-w-full">
                            <thead>
                                <tr>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white border-b uppercase border-black bg-[#1270B0]">No</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white border-b uppercase border-black bg-[#1270B0]">NIS</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white border-b uppercase border-black bg-[#1270B0]">Nama</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white border-b uppercase border-black bg-[#1270B0]">Tanggal</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white border-b uppercase border-black bg-[#1270B0]">Status</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-white border-b uppercase border-black bg-[#1270B0]">Deskripsi</th>
                                        <th class="px-6 py-3 text-xs text-left uppercase leading-4 font-medium tracking-wider text-white border-b border-black bg-[#1270B0]" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#6BA5F2] text-black" id="tbodyData">
                                @foreach ($daftarMagang as $data)
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
                                        {{ $data->tanggal }}
                                    </td>
                                    <td class="px-6 py-4 border-b text-ellipsis overflow-hidden whitespace-nowrap border-gray-200">
                                        {{ $data->status }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $data->deskripsi }}
                                    </td>
                                    <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap flex items-center mt-2 space-x-5">
                                        @if($data->persetujuan == '[]')
                                        <form action="{{ route('magang.persetujuan', $data->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="persetujuan" value="1">
                                            <button type="submit" id="approve" class="flex items-center bg-green-500 hover:bg-green-600 text-white p-2 px-5 rounded-lg">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('magang.persetujuan', $data->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="persetujuan" value="0">
                                            <button type="submit" id="alpa" class="flex items-center bg-red-600 hover:bg-red-700 text-white p-2 px-5 rounded-lg">
                                                Alpa
                                            </button>
                                        </form>
                                        @else
                                        <p class="text-black mt-2 text-base">Sudah dicek...</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#siswa').on('change', function(e) {
            $.ajax({
                type: 'GET',
                url: 'http://127.0.0.1:8000/magang/dataMagang/'+e.target.value,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data.length > 0) {
                        data.forEach(function(e) {
                            $('#tbodyData').html('<tr>\
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">\
                                            <div class="flex items-center">'
                                                +data.length+
                                            '</div>\
                                        </td>\
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">'
                                            +e.nisSiswa+
                                        '</td>\
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">'
                                            +e.siswa.nama+
                                        '</td>\
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">'
                                            +e.tanggal+
                                        '</td>\
                                        <td class="px-6 py-4 border-b text-ellipsis overflow-hidden whitespace-nowrap border-gray-200">'
                                            +e.status+    
                                        '</td>\
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">'
                                            +e.deskripsi+
                                        '</td>\
                                        <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap flex items-center mt-2 space-x-5">\
                                            <form action="{{ route("magang.persetujuan",'+e.id+') }}" method="POST">\
                                                @csrf\
                                                <input type="hidden" name="persetujuan" value="1">\
                                                <button type="submit" id="approve" class="flex items-center bg-green-500 hover:bg-green-600 text-white p-2 px-5 rounded-lg">\
                                                    Approve\
                                                </button>\
                                            </form>\
                                            <form action="{{ route("magang.persetujuan",'+e.id+') }}" method="POST">\
                                                @csrf\
                                                <input type="hidden" name="persetujuan" value="0">\
                                                <button type="submit" id="alpa" class="flex items-center bg-red-600 hover:bg-red-700 text-white p-2 px-5 rounded-lg">\
                                                    Alpa\
                                                </button>\
                                            </form>\
                                        </td>\
                                    </tr>')
                        })
                    } else {
                        $('#tbodyData').html('')
                    }
                }
            })
        })
    })
</script>
@endsection