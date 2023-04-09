@extends('layouts.layout')

@section('main')
<div class='grid grid-cols-1 sm:grid-cols-2 h-screen w-full'>
    <div class='hidden sm:block'>
        <img class='w-full h-full object-cover' src="{{ asset('assets/school.jpeg') }}" alt="">
    </div>
    <div class='flex flex-col justify-center' style="background-color: #2C8DE7;">
        <form id="form-login" class='w-full mx-auto bg-white p-8 px-8 rounded-lg' style="max-width: 38rem; height: 44rem;" method="POST" action="{{ route('login.bos') }}">
            <img class='w-6/12 block mx-auto h-6/12 mt-3 mb-3' src="{{ asset('assets/logo.png') }}" alt="">
            <!-- <h2 class='text-4xl dark:text-black font-bold text-center'>LOG IN</h2> -->
            <div class='flex flex-col text-gray-400 py-2'>
                <!-- <label>Email</label> -->
                <input name="email" id="email" class='rounded-lg bg-gray-100 mt-3 p-4 pl-8 focus:border-blue-500 focus:bg-gray-200 text-black focus:outline-none' style="font-size: 20px;" type="text" placeholder="Email" required>
            </div>
            <div class='flex flex-col text-gray-400 py-2'>
                <!-- <label>Password</label> -->
                <input name="password" id="password" class='rounded-lg bg-gray-100 mt-3 p-4 pl-8 focus:border-blue-500 focus:bg-gray-200 text-black focus:outline-none' style="font-size: 20px;" type="password" placeholder="Password" required>
            </div>
            <!-- <div class='flex justify-between text-gray-400 py-2'>
                <p class='flex items-center'><input class='mr-2' type="checkbox" /> Remember Me</p>
                <p>Forgot Password</p>
            </div> -->
            <button type="submit" class='w-full my-10 py-4 shadow-lg shadow-teal-500/10 hover:shadow-teal-500/40 text-white font-semibold rounded-lg focus:outline-none' style="background-color: #2C8DE7; font-size: 20px;">Log in</button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        function submitData(e) {
            e.preventDefault();
            
            $.ajax({
                type: 'POST',
                url: $('#form-login').attr('action'),
                data: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location.href = '/magang/bos'
                }
            })
        }

        $('#form-login').on('submit', submitData)
    })
</script>
@endsection