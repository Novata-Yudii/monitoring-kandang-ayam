<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDevice($id){
        $userDevice = User::find($id);
        $devices=[];
        foreach ($userDevice->device as $i => $device) {
            $devices[$i] = $device->fase_device;
        }
        return response()->json([
            'message'=>'User device ditemukan',
            'myDevices'=> count($userDevice->device),
            'fase_device'=>$devices,
            'data'=>$userDevice
        ]);
    }
}
