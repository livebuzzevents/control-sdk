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

\Buzz\Control\Service::setApiKey($api_key);
\Buzz\Control\Service::setDomain($domain);
\Buzz\Control\Service::setProtocol($protocol);
\Buzz\Control\Service::setOrganization($organization);
\Buzz\Control\Service::setCampaign($campaign);
\Buzz\Control\Service::setLanguage($language);
\Buzz\Control\Service::setVerifySsl(false);
\Buzz\Control\Service::setProxy($proxy);


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
