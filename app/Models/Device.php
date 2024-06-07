<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'kode', 'device_name'];

    public function dht(){
        return $this->hasMany(Dht::class,'device_kode','kode');
    }

    public function ldr(){
        return $this->hasMany(Ldr::class, 'device_kode','kode');
    }

    public function configlampu(){
        return $this->hasOne(ConfigLampu::class, 'device_kode','kode');
    }

    public function configheater(){
        return $this->hasOne(ConfigHeater::class, 'device_kode','kode');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
