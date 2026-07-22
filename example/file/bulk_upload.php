<?php

use Buzz\Control\Campaign\Customer;
use Buzz\Control\Campaign\File;

require_once '../bootstrap.php';

foreach (new DirectoryIterator('photos') as $fileInfo) {
    if (! $fileInfo->isFile() || starts_with($fileInfo->getFilename(), '.')) {
        continue;
    }

    $sourceId = $fileInfo->getBasename('.'.$fileInfo->getExtension());
    $customer = (new Customer)->first([['source_id', 'is', $sourceId]]);

    if (! $customer) {
        throw new Exception("No customer with source id {$sourceId} found");
    }

    (new File)
        ->addSystem(
            $customer,
            'photo_id',
            $fileInfo->getFilename(),
            file_get_contents($fileInfo->getPathname())
        );
}
