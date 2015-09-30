<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(22);

$flowService = new \Buzz\Control\Services\Customer\FlowService($buzz);

$flowService->goToStep($customer, 2);
