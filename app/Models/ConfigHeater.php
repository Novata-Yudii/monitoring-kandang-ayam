<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigHeater extends Model
{
    use HasFactory;
    protected $fillable = ['device_kode', 'min_temp', 'max_temp','status'];

    public function device(){
        return $this->belongsTo(Device::class, 'device_kode', 'kode');
    }
}
