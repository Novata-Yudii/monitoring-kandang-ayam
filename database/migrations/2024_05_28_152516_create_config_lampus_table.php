<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('config_lampus', function (Blueprint $table) {
            $table->id();
            $table->string('device_kode');
            $table->foreign('device_kode')->references('kode')->on('devices');
            $table->time('lamp_on')->nullable();
            $table->time('lamp_off')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('config_lampus');
    }
};
