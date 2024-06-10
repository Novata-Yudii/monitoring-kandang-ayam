<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigLampu extends Model
{
    use HasFactory;
    protected $fillable = ['device_kode', 'lamp_on', 'lamp_off','status'];

    public function device(){
        return $this->belongsTo(Device::class, 'device_kode', 'kode');
    }
}
