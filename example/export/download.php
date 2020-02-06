<?php

require_once '../bootstrap.php';

$export = new \Buzz\Control\Campaign\Export('03fdf994-480f-11ea-8459-000000000000');

$content = (new \Buzz\Control\Campaign\Export())->download($export);

header('Content-Type: text/csv');
header('Content-disposition: inline; filename="export.csv"');
header('Cache-Control: public, must-revalidate, max-age=0');
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');

echo base64_decode($content);
