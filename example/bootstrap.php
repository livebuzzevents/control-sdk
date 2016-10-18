<?php

require_once(__DIR__ . '/../vendor/autoload.php');

if (file_exists(__DIR__ . '/config.php')) {
    require __DIR__ . '/config.php';
} else {
    require __DIR__ . '/config.example.php';
}

if ($showErrors) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$buzz = new \Buzz\Control\Buzz();

$credentials = new \Buzz\Control\Credentials();
$credentials->setApiKey($api_key);
$credentials->setDomain($domain);
$credentials->setProtocol($protocol);
$credentials->setOrganization($organization);
$credentials->setVerifySsl(false);
$credentials->setProxy($proxy);

$buzz->setCredentials($credentials);

//$scope = new \Buzz\Control\Scope();
//$scope->add(1);
//$buzz->setScope($scope);

$campaign = new \Buzz\Control\Objects\Campaign();
$campaign->setIdentifier($campaignIdentifier);

//$stream = new \Buzz\Control\Objects\Stream();
//$stream->setIdentifier('visitor-registration');
//$stream->setCampaign($campaign);
//$buzz->setStream($stream);

//$customerFlow = new \Buzz\Control\CustomerFlow(new Buzz\Control\Objects\Customer(1));
//$buzz->setCustomerFlow($customerFlow);

function dd($v)
{
    dump($v);
    exit();
}

function dump($v)
{
    echo '<pre>';
    var_dump($v);
    echo '</pre>';
}
