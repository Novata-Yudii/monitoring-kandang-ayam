<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dhts', function (Blueprint $table) {
            $table->id();
            $table->string('device_kode');
            $table->foreign('device_kode')->references('kode')->on('devices');
            $table->decimal('temperature');
            $table->decimal('humidity');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dhts');
    }
};
