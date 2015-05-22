<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$api_key         = '55364c96907e6';
$endpoint        = 'http://www.reg.dev/rest/';
$organization_id = 2;

$credentials = new Buzz\Control\Credentials($api_key, $organization_id, $endpoint);

$serviceHandler = new Buzz\Control\ServiceHandler($credentials);
