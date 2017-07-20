<?php

require_once '../bootstrap.php';

$channel = (new \Buzz\Control\Organization\Channel())->first();

dd($channel);
