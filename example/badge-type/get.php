<?php

use Buzz\Control\Campaign\BadgeType;

require_once '../bootstrap.php';

$badge_type = (new BadgeType())->first();

dd($badge_type);
