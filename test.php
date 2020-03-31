<?php

require_once realpath(__DIR__ . '/vendor/autoload.php');

use Kan\Hive\Hive;
use Kan\Hive\Device\Action;
use Kan\Hive\Device\Camera;
use Kan\Hive\Device\Device;
use Kan\Hive\Device\Plug;
use Kan\Hive\Service\Access;
use Kan\Hive\Service\Client;
use Kan\Hive\Service\Credentials;

/*
$credentials = new Credentials(
    'jedkirby@me.com',
    '4CW2{0/7dWQSxi'
);

$access = new Access(
    $credentials
);

$client = new Client(
    $access
);
*/

$hive = new Hive(
    'jedkirby@me.com',
    '4CW2{0/7dWQSxi'
);

// $device = new Action($client, '7df2b858-8c46-4f41-953f-fb0cafa3864c');
// $device->trigger();

// $device = new Camera($client, '4417c469-6253-4def-8e35-b13c1a853189');
// $device->on();

$device = new Plug($hive->getClient(), '447473cd-2753-4621-a696-c67aff9e81e1');
$device->on();
