<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return view('home');
    }
    function cleanser(){
        return view('cleanser');
    }
    function sprayer(){
        return view('sprayer');
    }


}
