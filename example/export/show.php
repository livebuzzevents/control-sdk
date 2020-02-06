<?php

require_once '../bootstrap.php';

$export = (new \Buzz\Control\Campaign\Export())
    ->show(new \Buzz\Control\Campaign\Export('03fdf994-480f-11ea-8459-000000000000'));

dd($export);
