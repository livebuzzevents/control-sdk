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

$campaign = new \Buzz\Control\Objects\Campaign();
$campaign->setIdentifier('bbf16');

$stream = new \Buzz\Control\Objects\Stream();
$stream->setIdentifier('reg');
$stream->setCampaign($campaign);
$buzz->setStream($stream);

$customerFlow = new \Buzz\Control\CustomerFlow(new Buzz\Control\Objects\Customer(1));
$buzz->setCustomerFlow($customerFlow);

function dd($v)
{
    echo '<pre>';
    var_dump($v);
    echo '</pre>';
    exit();
}