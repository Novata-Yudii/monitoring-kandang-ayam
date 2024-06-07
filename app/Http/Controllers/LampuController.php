<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LampuController extends Controller
{
    public function index(){
        return view('pages.lampu', ['title'=>'Lampu']);
    }
}
