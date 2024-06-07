<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        
        // $myDevice = Auth::user()->device;
        return view('pages.dashboard', [
            'title' => 'Dashboard'
            // 'myDevice' => $myDevice
    ]);
    }
}
