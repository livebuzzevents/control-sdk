<?php

require_once '../bootstrap.php';

$filter = new \Buzz\Control\Filter();
$filter->add('email', 'contains', '@uat.buzz');
$filter->add('badgeType', 'has');

$eBadge = (new \Buzz\Control\Campaign\EBadge())->get($filter);

header('Content-Type: application/pdf');
header('Content-disposition: inline; filename="badge.pdf"');
header('Cache-Control: public, must-revalidate, max-age=0');
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');

echo base64_decode($eBadge);
