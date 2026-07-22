<?php

use Buzz\Control\Campaign\Export;
use Buzz\Control\Campaign\ExportPreset;

require_once '../bootstrap.php';

$preset = new ExportPreset('5f1d57b2-480e-11ea-925c-000000000000');

$export = (new Export)->createFromPreset($preset);

echo dd($export);
