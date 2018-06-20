<?php

use Buzz\Control\Campaign\Scan;

require_once '../bootstrap.php';

$scan = (new Scan())->first();

dd($scan);
