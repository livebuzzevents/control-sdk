<?php

require_once '../bootstrap.php';

$filesToShred = collect();
$page         = 1;
$counter      = 1;

while (true) {
    $files = (new \Buzz\Control\Campaign\File())->get([['identifier', 'is', 'credentials']], $page, 25);

    if ($files->isEmpty()) {
        break;
    }

    $filesToShred = $filesToShred->merge($files);
    $page++;
}

$total = $filesToShred->count();

foreach ($filesToShred as $fileToShred) {
    echo "[$counter of $total] Deleting credential file $fileToShred->id for customer $fileToShred->model_id \n";
    $fileToShred->delete();
    $counter++;
}