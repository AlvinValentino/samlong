<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginBos;
use App\Models\LoginGuru;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerSiswa(Request $request) {
        $validatedData = $request->validate([
            'nis' => 'required',
            'email' => 'required|email|unique:login_siswa',
            'password' => 'required|min:6'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $siswa = User::create($validatedData);
        return response()->json($siswa);
    }

    public function registerGuru(Request $request) {
        $validatedData = $request->validate([
            'kode' => 'required',
            'email' => 'required|email|unique:login_guru',
            'password' => 'required|min:6'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $guru = LoginGuru::create($validatedData);
        return response()->json($guru);
    }

    public function registerBos(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:login_bos',
            'password' => 'required|min:6'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $bos = LoginBos::create($validatedData);
        return response()->json($bos);
    }
}
