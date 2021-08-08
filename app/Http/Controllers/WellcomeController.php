<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WellcomeController extends Controller
{
    function toshow() {
        return view('welcome');
    }
}
