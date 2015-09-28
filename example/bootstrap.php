<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$api_key      = '55bb6fa8e9eb7';
$endpoint     = 'http://control.dev/rest/v1/';
$organization = 'bigbang';

$buzz = new \Buzz\Control\Buzz();

$credentials = new \Buzz\Control\Credentials();
$credentials->setApiKey($api_key);
$credentials->setEndpoint($endpoint);
$credentials->setOrganization($organization);

$buzz->setCredentials($credentials);

$scope = new \Buzz\Control\Scope();
$scope->add(1);

$buzz->setScope($scope);

$customerFlow = new \Buzz\Control\CustomerFlow(new Buzz\Control\Objects\Customer(1), 2, 'reg');
$buzz->setCustomerFlow($customerFlow);

function dd($v)
{
    echo '<pre>';
    var_dump($v);
    echo '</pre>';
    exit();
}