<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if(Auth::check() || Auth::guard('guru')->check()) {
        return view('home', ['title' => 'Halaman Home']);
        }
        
        return redirect()->back();
    }
}
