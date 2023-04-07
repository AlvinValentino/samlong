<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function createNewToken($token) {
        return [
            'token' => $token,
            'type' => 'bearer',
            'success' => 'Authentikasi berhasil!',
        ];
    }

    public function indexSiswa() {
        if(Auth::check() || Auth::guard('guru')->check()) {
            return redirect()->back();
        }
        return view('auth.siswa', ['title' => 'Halaman Login']);
    }

    public function indexGuru() {
        if(Auth::check() || Auth::guard('guru')->check()) {
            return redirect()->back();
        }
        return view('auth.guru', ['title' => 'Halaman Login']);
    }

    public function loginSiswa(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($token = Auth::attempt($validatedData)) {
            return $this->createNewToken($token);
        }

        return response()->json(['message' => 'Authentikasi gagal!'], 401);
    }

    public function loginGuru(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($token = Auth::guard('guru')->attempt($validatedData)) {
            return $this->createNewToken($token);
        }

        return response()->json(['message' => 'Authentikasi gagal!'], 401);
    }

    public function logout() {
        if(Auth::user()) {
            Auth::logout();

            return redirect()->route('index.siswa');
        } elseif(Auth::guard('guru')->user()) {
            Auth::guard('guru')->logout();
            
            return redirect()->route('index.guru');
        }
    }
}
