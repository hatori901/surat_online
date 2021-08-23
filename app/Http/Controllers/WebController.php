<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('web.welcome');
    }
    public function tentang(){
        return view('web.tentang');
    }
}
