<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function contract(){
        return view('contract');
    }

    public function lichidari(){
        return view('lichidari');
    }

    
}
