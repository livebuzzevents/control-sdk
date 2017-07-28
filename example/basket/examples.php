<?php

use Buzz\Control\Campaign\Basket;

require_once '../bootstrap.php';

$basket = (new Basket())->create(['customer_id' => 'customer_id_here']);

$basket->vat_exempt = 'no';
$basket->po_number  = '12312321';
// or
$basket->save();

$basket->setPoNumber('12312312');
$basket->setVatExempt('yes');
