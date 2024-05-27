<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ldr;

class LdrController extends Controller
{
    public function index(){
        return Ldr::all();
    }

    public function store(Request $request){
        Ldr::create([
            'device_id' => $request->device_id,
            'ldr' => $request->ldr
        ]);
    }
}
