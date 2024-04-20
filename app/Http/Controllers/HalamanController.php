<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index(Request $request) {
        return view('welcome');
    }
    public function halaman(Request $request){
        return view('halamanutama');
    }
    public function login(Request $request){
        return view('login');
    }
}