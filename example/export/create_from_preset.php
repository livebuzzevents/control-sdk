<?php

require_once '../bootstrap.php';

$preset = new \Buzz\Control\Campaign\ExportPreset('5f1d57b2-480e-11ea-925c-000000000000');

$export = (new \Buzz\Control\Campaign\Export())->createFromPreset($preset);

echo dd($export);
