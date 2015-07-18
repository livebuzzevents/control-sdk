<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$api_key         = '55364c96907e6';
$endpoint        = 'http://www.control.dev/rest/';
$organization_id = 1;

\Buzz\Control\Buzz::setCredentials(
    new Buzz\Control\Credentials($api_key, $organization_id, $endpoint)
);

function dd($v)
{
    echo '<pre>';
    var_dump($v);
    echo '</pre>';
    exit();
}