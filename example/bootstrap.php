<?php

use Buzz\Control\Service;

require_once __DIR__.'/../vendor/autoload.php';

if (file_exists(__DIR__.'/config.php')) {
    require __DIR__.'/config.php';
} else {
    require __DIR__.'/config.example.php';
}

if ($showErrors) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

Service::setApiKey($api_key);
Service::setDomain($domain);
Service::setProtocol($protocol);
Service::setGateway($gateway);
Service::setOrganization($organization);
Service::setCampaign($campaign);
Service::setLanguage($language);
Service::setVerifySsl(false);
Service::setProxy($proxy);

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
