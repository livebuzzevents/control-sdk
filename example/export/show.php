<?php

use Buzz\Control\Campaign\Export;

require_once '../bootstrap.php';

$export = (new Export)
    ->show(new Export('03fdf994-480f-11ea-8459-000000000000'));

dd($export);
