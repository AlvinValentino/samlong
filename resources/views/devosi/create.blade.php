@extends('layouts.layout')
@php($count = 1)

@section('main')
<div class="bg-gray-400" style="height: 100vh;">
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 py-4">
                <button type="button" class="bg-blue-500 hover:bg-blue-700 focus:outline-none text-white font-bold py-2 px-4 rounded my-5 ml-10" data-modal-target="devosi-modal" data-modal-toggle="devosi-modal">Tambah Devosi</button>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
            <div class="overflow-x-auto sm:px-6 lg:px-10">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg bg-white">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">No</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Tanggal</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Judul</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Ayat</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Teks</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Sumber</th>
                                <th class="px-6 py-3 text-xs text-left uppercase leading-4 font-medium tracking-wider text-gray-500 border-b border-gray-200 bg-gray-50" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($dataDevosi as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        {{ $count++ }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data->tanggal }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data->judul }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data->ayat }}
                                </td>
                                <td class="px-6 py-4 border-b text-ellipsis overflow-hidden whitespace-nowrap border-gray-200">
                                    {{ Str::limit($data->teks, ) }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data->sumber }}
                                </td>
                                <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                    <button type="submit" id="editData" class="flex items-center" data-modal-target="devosi-modal" data-modal-toggle="devosi-modal" data-id='{{ $data->id }}'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600 hover:text-indigo-900 focus:outline-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </td>
                                <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                    <form action="{{ route('devosi.destroy', $data->id) }}" method="POST">
                                        @csrf                                    
                                        <button type="submit" class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800 focus:outline-none cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>                      
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

<div id="devosi-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-full max-w-xl md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="ml-2 text-xl font-semibold text-gray-900" id="userCrudModal">Tambah Devosi</h3>
                <button type="button" class="text-gray-400 bg-transparent focus:outline-none rounded-lg text-sm p-1 ml-auto inline-flex items-center" data-modal-hide="devosi-modal">
                    <svg aria-hidden="true" class="w-5 h-5 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-6 space-y-6">
                <form id="form-devosi" action="{{ route('devosi.store') }}">
                    <input type="hidden" id="method" value="store">
                    <input type="hidden" name="kodeguru" value="{{ Auth::guard('guru')->id() }}">
                    <div class="mb-4">
                        <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal :</label>
                        <input type="date" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="tanggal" placeholder="Tanggal" name="tanggal" value="">
                    </div>
                    <div class="mb-4">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul :</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="judul" placeholder="Judul" name="judul">
                    </div>
                    <div class="mb-4">
                        <label for="ayat" class="block mb-2 text-sm font-medium text-gray-900">Ayat :</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="ayat" placeholder="Ayat" name="ayat" value="">
                    </div>
                    <div class="mb-4">
                    <label for="sumber" class="block mb-2 text-sm font-medium text-gray-900">Sumber :</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="sumber" placeholder="Sumber" name="sumber" value="">
                    </div>
                    <div class="mb-4">
                        <label for="teks" class="block mb-2 text-sm font-medium text-gray-900">Teks Devosi :</label>
                        <textarea name="teks" rows="4" class="shadow aprrearance-none block p-3 w-full text-gray-700 rounded-lg border focus:outline-none focus:shadow-outline" id="teks" placeholder="Teks Devosi" value=""></textarea>
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
        function submitData(e) {
            e.preventDefault();
            
            $.ajax({
                type: 'POST',
                url: $('#form-devosi').attr('action'),
                data: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    location.reload();
                }
            })
        }

        $('#form-devosi').on('submit', submitData)

        $('body').on('click', '#editData', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            $.get('edit/' + id, function (data) {
                $('#userCrudModal').html("Edit Devosi");
                $('#id').val(id);
                $('#tanggal').val(data.dataDevosi[0].tanggal);
                $('#judul').val(data.dataDevosi[0].judul);
                $('#ayat').val(data.dataDevosi[0].ayat);
                $('#sumber').val(data.dataDevosi[0].sumber);
                $('#teks').val(data.dataDevosi[0].teks);
                $('#form-devosi').attr('action', '/devosi/update/' + id);
                $('#method').val('update');
            })
        });

        var fullDate = new Date();
        var twoDigitMonth = fullDate.getMonth()+1+"";if(twoDigitMonth.length==1)	twoDigitMonth="0" + twoDigitMonth;
        var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" + twoDigitDate;
        var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate;
        $('#tanggal').val(currentDate);
    })
</script>
@endsection