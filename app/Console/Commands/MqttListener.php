<?php

namespace App\Console\Commands;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use Illuminate\Console\Command;

class MqttListener extends Command
{
    protected $signature = 'app:mqtt-listener';

    protected $description = 'Command description';

    public function handle()
    {
        $hostBroker = "x10ea311.ala.asia-southeast1.emqxsl.com";
        $portBroker = 8883;
        $clientId = 'emqx-novatayudi';
        $client = new MqttClient($hostBroker, $portBroker, $clientId, MqttClient::MQTT_3_1);
        $connectionSettings = (new ConnectionSettings)
        ->setUseTls(true)
        ->setTlsSelfSignedAllowed(true)
        ->setTlsVerifyPeer(false)
        ->setUsername("Novatayudi")
        ->setPassword("Xos116ya77");

        $client->connect($connectionSettings, true);
        echo sprintf("Connected\n");
        $client->subscribe('/temperature', function (string $topic, string $message, bool $retained){
            echo sprintf("Received message on topic [%s]: %s\n", $topic, $message);
            // After receiving the first message on the subscribed topic, we want the client to stop listening for messages.
            // $client->interrupt();
        }, MqttClient::QOS_AT_MOST_ONCE);
        
        $client->loop(true);
        $client->disconnect();
    }
}
