<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'fase_device'];

    public function dht(){
        return $this->hasMany(Dht::class);
    }

    public function ldr(){
        return $this->hasMany(Ldr::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
