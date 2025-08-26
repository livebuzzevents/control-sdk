<?php

use Buzz\Control\Campaign\Allowance;
use Buzz\Control\Campaign\Exhibitor;
use Buzz\Control\Filter;

require_once '../bootstrap.php';

$filename = 'list.csv';
$exhibitorIds = [];
$i = 1;
$chunks = 5;

if (($handle = fopen($filename, "r")) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $exhibitorIds[] = $row[0];
    }
    fclose($handle);
}

$idTotal = count($exhibitorIds);
$chunks = array_chunk($exhibitorIds, $chunks);
$chunkCount = 1;

foreach ($chunks as $chunkIndex => $chunk) {
    $exhibitors = (new Exhibitor())->get([['id', 'in', $chunk]]);

    foreach ($exhibitors as $exhibitor) {
        echo "[$i of $idTotal] tagging exhibitor $exhibitor->name ($exhibitor->id) \n";
        $exhibitor->tag('SmartScan Mandate');
        $i++;
    }

    $chunkCount++;
}