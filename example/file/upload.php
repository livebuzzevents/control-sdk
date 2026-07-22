<?php

use Buzz\Control\Campaign\Exhibitor;
use Buzz\Control\Campaign\File;

require_once '../bootstrap.php';

$file = new File;
$file->addSystem(
    new Exhibitor('f666ec24-7ded-11e8-b090-000000000000'),
    'profile_logo',
    'logo.png',
    file_get_contents('logo.png')
);
