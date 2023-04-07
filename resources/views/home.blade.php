@extends('layouts.sidebar')
@extends('layouts.layout')

@section('main')
<div class="relative w-full right-0 text-3xl bg-gradient-to-r from-[#2372D9] via-blue-500 to-blue-400">
        <ul class="a">
            <li></li><li></li>
            <li></li><li></li>
            <li></li><li></li>
            <li></li><li></li>
            <li></li><li></li>
            <li></li><li></li>
            <li></li><li></li>
            <li></li><li></li>
        </ul>
    <div>
        <div class="sticky w-full top-0">
            <div class="ml-20">
                <p class="text-white text-2xl pt-3 ml-10 font-bold">Home</p>
            </div>
        </div>

        <div class="flex p-10 justify-between">
            <div class="mt-20 ml-10">
                <h2 class="text-white font-serif ml-28 pt-7 text-6xl">Welcome</h2>
                <h2 class="text-white font-serif ml-28 pt-2 text-5xl">{{ Auth::guard('guru')->check() ? Auth::guard('guru')->user()->guru->nama : Auth::user()->siswa->nama }}</h2>
                <h2 class="text-white font-serif ml-28 pt-2 text-4xl">{{ Auth::check() ? Auth::user()->siswa->nis : '' }}</h2>
            </div>
            <img class="w-[20%] mr-24" src="{{ asset('assets/logo.png') }}" alt="Immanuel" />
        </div>
    </div>
    <div class="bg-white flex flex-row justify-between p-[4%] uppercase">
        <div class="flex items-center flex-col">
            <h2 class="text-center">Devosi</h2>
            <img class="w-[50%]" src="{{ asset('assets/Book1.png') }}" alt="Book">
        </div>

        <div class="flex items-center flex-col"> 
            <h2 class="text-center">Pembelajaran</h2>
            <img class="w-[50%]" src="{{ asset('assets/Doc1.png') }}" alt="doc">
        </div>
            
        <div class="flex items-center flex-col">
            <h2 class="text-center">Magang</h2>
            <img class="w-[50%]" src="{{ asset('assets/Training1.png') }}" alt="magang">
        </div>
    </div>
</div>

<style>
.a {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.a li {
    position: absolute;
    display: block;
    list-style: none;
    width: 25px;
    height: 25px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 20s linear infinite;
    border-radius: 50%;
    bottom: -150px;
}
 .a li:nth-child(1){
    bottom: 30%;
    left: 76%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
    animation-duration: 12s;
}
.a li:nth-child(2){
    bottom: 30%;
    left: 90%;
    width: 80px;
    height: 80px;
    animation-delay: 5s;
    animation-duration: 15s;
}
.a li:nth-child(3){
    bottom: 30%;
    left: 65%;
    width: 30px;
    height: 30px;
    animation-delay: 3s;
    animation-duration: 15s;
}.a li:nth-child(4){
    bottom: 30%;
    left: 60%;
    width: 30px;
    height: 30px;
    animation-delay: 1.5s;
    animation-duration: 10s;
}

.a li:nth-child(5){
    bottom: 30%;
    left: 40%;
    width: 100px;
    height: 100px;
    animation-delay: 5.5s;
}
.a li:nth-child(6){
    bottom: 30%;
    left: 70%;
    width: 100px;
    height: 100px;
    animation-delay: 15s;
}

.a li:nth-child(7){
    bottom:30%;
    left: 25%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 15s;
}

.a li:nth-child(8){
    bottom: 25%;
    left: 5%;
    width: 100px;
    height: 100px;
    animation-delay: 1s;
    animation-duration: 11s;
}

.a li:nth-child(9){
    bottom: 30%;
    left: 80%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}
.a li:nth-child(10){
    bottom: 30%;
    left: 15%;
    width: 110px;
    height: 110px;
    animation-delay: 3.5s;
}
.a li:nth-child(11){
    bottom: 30%;
    left: 3%;
    width: 30px;
    height: 30px;
    animation-delay: 1.5s;
}

.a li:nth-child(12){
    bottom: 30%;
    left: 55%;
    width: 75px;
    height: 75px;
    animation-delay: 0s;
}

.a li:nth-child(13){
    bottom: 30%;
    left: 45%;
    width: 85px;
    height: 85px;
    animation-delay: 10s;
}
.a li:nth-child(14){
    bottom:30%;
    left: 38%;
    width: 95px;
    height: 95px;
    animation-delay: 0s;
    animation-duration: 10s;
}
.a li:nth-child(15){
    bottom:30%;
    left: 8%;
    width: 45px;
    height: 45px;
    animation-delay: 0s;
    animation-duration: 15s;
}
.a li:nth-child(16){
    bottom: 30%;
    left: 78%;
    width: 100px;
    height: 100px;
    animation-delay: 2s;
    animation-duration: 10s;
}
@keyframes animate{
    0%{
        transform: translateY(0) rotate(0deg);
        opacity: 1;
    }
    100%{
        transform: translateY(-800px) rotate(0deg);
        opacity: 1;
    }
}
</style>
@endsection