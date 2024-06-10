<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeaterController extends Controller
{
    public function config(){
        $user = User::where('name', Auth::user()->name)->get()[0];
        $allKode = $user->device;
        return view('pages.heater', [
            'title' => 'Heater',
            'allKode' => $allKode
        ]);
    }

    public function manual(){
        $user = User::where('name', Auth::user()->name)->get()[0];
        $allKode = $user->device;
        return view('pages.heatermanual',[
            'title' => 'HeaterManual',
            'allKode' => $allKode
        ]);
    }
}
