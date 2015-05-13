<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$api_key  = '55364c96907e6';
$endpoint = 'http://www.reg.dev/rest/';

$credentials = new Buzz\Control\Credentials($api_key, $endpoint);

$serviceHandler = new Buzz\Control\ServiceHandler($credentials);

echo '<pre>';
var_dump(\Buzz\Control\Objects\Badge::createFromArray([
    'badge_type' => ['id' => 3],
    'customer'   => ['id' => 5],
    'scans'      => [['id' => 33], ['id' => 31]]
]));
echo '</pre>';