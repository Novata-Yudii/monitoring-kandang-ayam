<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dht;

class DhtController extends Controller
{
    public function index(){
        return Dht::all();
    }

    public function store(Request $request){
        Dht::create([
            'device_id' => $request->device_id,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity
        ]);
    }
}
