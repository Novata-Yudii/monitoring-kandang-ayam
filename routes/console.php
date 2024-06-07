<?php

use App\Console\Commands\MqttListener;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('mqtt', function () {
    Artisan::call(MqttListener::class);
})->purpose('Subscribe mqtt');