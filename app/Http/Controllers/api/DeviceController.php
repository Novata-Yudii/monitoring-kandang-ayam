<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(){
        $device = Device::all();
        return response()->json([
            'message' => 'Device ditemukan',
            'data' => $device
        ]);
    }

    public function store(Request $request){
        $device = Device::create([
            'user_id' => $request->user_id,
            'fase_device' => $request->fase_device
        ],);
        return response()->json([
            'message' => 'Berhasil menambahkan data',
            'data' => $device
        ]);
    }

    public function showDht($id){
        $device = Device::find($id);
        $dhtValue = [];
        foreach ($device->dht as $i => $dht) {
            $dhtValue[$i] = $dht;
        }
        return response()->json([
            'message' => 'Berhasil menemukan data dht',
            'data' => $dhtValue
        ]);
    }

    public function showLdr($id){
        $device = Device::find($id);
        $ldrValue = [];
        foreach ($device->ldr as $i => $ldr) {
            $ldrValue[$i] = $ldr;
        }
        return response()->json([
            'message' => 'Berhasil menemukan data ldr',
            'data' => $ldrValue
        ]);
    }
}
