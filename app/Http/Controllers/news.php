<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class news extends Controller
{
    public function show(){
        return view('news');
    }
}
