<?php

use Buzz\Control\Campaign\Affiliate;
use \Buzz\Control\Campaign\Stream;

require_once '../bootstrap.php';

$affiliate = (new Affiliate())->create([
    'name' => 'example-affiliate-' . rand(1000, 9999),
    'stream_id' => (new Stream())->first()->id,
]);

dd($affiliate);
