<?php

use Buzz\Control\Organization\Channel;

require_once '../bootstrap.php';

$channel = (new Channel)->first();

dd($channel);
