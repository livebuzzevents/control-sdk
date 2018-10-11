<?php

require_once '../bootstrap.php';

$file = new \Buzz\Control\Campaign\File();
$file->addSystem(
    new \Buzz\Control\Campaign\Exhibitor('f666ec24-7ded-11e8-b090-000000000000'),
    'profile_logo',
    'logo.png',
    file_get_contents('logo.png')
);
