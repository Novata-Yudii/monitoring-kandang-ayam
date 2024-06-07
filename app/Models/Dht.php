<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dht extends Model
{
    use HasFactory;
    protected $fillable = ['device_kode','temperature','humidity'];

    public function device(){
        return $this->belongsTo(Device::class, 'device_kode', 'kode');
    }
}
