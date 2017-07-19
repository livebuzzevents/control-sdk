<?php

use Buzz\Control\Campaign\Affiliate;

require_once '../bootstrap.php';

$affiliate = (new Affiliate())->first();

dd($affiliate);
