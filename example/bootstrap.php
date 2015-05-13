<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$api_key  = '55190489d963c';
$endpoint = 'http://www.reg.dev/rest/';

$credentials = new Buzz\Control\Credentials($api_key, $endpoint);

$serviceHandler = new Buzz\Control\ServiceHandler($credentials);
