<?php

use Buzz\Control\Objects;

exit();

require_once '../bootstrap.php';

$badgeType = new Objects\BadgeType('3f5c20c4-123a-482e-ad10-fac9a0560000');
$campaign  = new Objects\Campaign('dcff6aff-50e1-449f-8d4c-9a18421d0000');

$users = json_decode('[{"name":"George Adam ","position":" CEO ","company":" Impression Technologies"},
{"name":"Mark Adam ","position":" Managing Director ","company":" SDF"},
{"name":"Mick Aires ","position":"Purchase Manager","company":" General Motors"},
{"name":"Tony Allen ","position":" Plant Manager & MD ","company":" BorgWarner Turbo Systems"},
{"name":"Nik Armistead ","position":" Consultant Marketing & Public Affairs ","company":" Robert Bosch Ltd"},
{"name":"Michael Baunton ","position":" SMMT Industry Forum","company":""},
{"name":"Alice Belcher ","position":" Degree Apprentice ","company":" Jaguar Land Rover"},
{"name":"Jeanette Bent ","position":" Nissan Europe","company":""},
{"name":"Gerald Chadwick ","position":" Sales / Commercial Director ","company":" The Brookvale Manufacturing Co.Ltd"},
{"name":"Kavina Chauhan ","position":" Buyer Audio and Dash Cams ","company":" Halfords"},
{"name":"Mark Cooke ","position":" Head of Interior & Exterior Commodities ","company":" Bentley Motors"},
{"name":"Steve Cragg ","position":" Group Chief Engineer ","company":" GKN"},
{"name":"David Fulker ","position":" Marketing Manager ","company":" Robert Bosch Ltd"},
{"name":"Ian Harnett ","position":" Purchasing Director ","company":" Jaguar Land Rover"},
{"name":"Gary Heywood ","position":" Purchase Director ","company":" Bentley Motors"},
{"name":"Martin Humphries ","position":" Sales Key Account Manager ","company":" Aisin Europe"},
{"name":"Nick Hussey ","position":" Managing Director ","company":" The Manufacturer"},
{"name":"Catherine Hutt ","position":" Principal Consultant ","company":" Frost and Sullivan"},
{"name":"Adrian Jackson ","position":" Senior Manager ","company":" Calsonic Kansei Europe Plc"},
{"name":"Arun Jayaraman ","position":" Director of Supply Chain Production Division ","company":" TVS Supply Chain Solutions"},
{"name":"Stephanie Jones ","position":" International Communications Officer ","company":" Jaguar Land Rover"},
{"name":"Gareth Jones ","position":" MD & SMMT President ","company":" Pritex Ltd"},
{"name":"Frode Larssen ","position":" CEO ","company":" Otechos Engines Ltd"},
{"name":"Eman Martine-Vignerte ","position":" Director Political Affairs & Governmental Relations ","company":" Robert Bosch Ltd"},
{"name":"Simon Moger ","position":" Head of Government Programmes ","company":" Jaguar Land Rover"},
{"name":"Daren Mottershead ","position":" Sales & Marketing Manager ","company":" MAHLE Powertrain Ltd"},
{"name":"Lloyd Mulkerrins ","position":" Public Policy Assistant ","company":" Vauxhall"},
{"name":"Michael Mychajluk ","position":" Supply Chain Engagement Manager ","company":" Jaguar Land Rover"},
{"name":"Karen Myring ","position":" Legal -Section Leader - ","company":"Calsonic Kansei Europe plc"},
{"name":"Jon Oliver ","position":" Category Manager-Tech ","company":" Halfords"},
{"name":"Stuart Padfield ","position":" Head of Business Development ","company":" Yusen Logistics"},
{"name":"Andy Palmer ","position":" CEO ","company":" Aston Martin Lagonda"},
{"name":"William Quah ","position":" Marketing Manager ","company":" MK Tron Holdings "},
{"name":"Chris Saunders ","position":"","company":" GKN Plc"},
{"name":"David Smith ","position":" Commercial Manager ","company":" Amethyst Group Ltd"},
{"name":"Arun Srinivasan ","position":" Senior VP Bosch Mobility Solutions ","company":" Robert Bosch"},
{"name":"Nigel Stein ","position":" CEO ","company":" GKN Plc"},
{"name":"James M Stephens ","position":" Global Head of Government Affairs ","company":" Aston Martin"},
{"name":"Dermot Sterne ","position":" Managing Director ","company":" Applied Component Technology Ltd"},
{"name":"Peter Stoker ","position":" Chief Engineer, Vehicle ","company":" Millbrook"},
{"name":"John Tidball ","position":" Managing Director ","company":" The Brookvale Manufacturing Co.Ltd"},
{"name":"Rajan Varadarjan ","position":" MK Tron UK Ltd","company":""},
{"name":"Andy Wareing ","position":" General Manager Purchasing ","company":" Nissan Europe"},
{"name":"Tony Wolger ","position":" Head of Purchase Projects ","company":" Bentley Motors"},
{"name":"Martin Wood ","position":" Business Development Director","company":"UKTI"},
{"name":"Chris Woodhams ","position":" Managing Director ","company":" Argenta"},
{"name":"Xue Zhong You ","position":" President ","company":" Covpress Assembly"}]', true);

foreach ($users as $key => $user) {
    foreach ($user as $param => $value) {
        $users[$key][$param] = trim($value);
    }

    $names = explode(' ', $users[$key]['name'], 2);

    $users[$key]['first_name'] = $names[0];
    $users[$key]['last_name']  = $names[1];
}

foreach ($users as $user) {
    $customers = (new \Buzz\Control\Services\CustomerService($buzz))
        ->where('first_name', 'is', $user['first_name'])
        ->where('last_name', 'is', $user['last_name'])
        ->where('badges.badge_type_id', 'is', $badgeType->getId())
        ->getMany();

    if (!$customers->isEmpty()) {
        print 'FOUND: ' . $customers->first()->getFirstName() . ' ' . $customers->first()->getLastName() . PHP_EOL;
        continue;
    }

    $customer = new Objects\Customer();

    $customer->setCampaignId($campaign->getId());
    $customer->setFirstName($user['first_name']);
    $customer->setLastName($user['last_name']);
    $customer->setStatus('active');

    $job = new \Buzz\Control\Objects\Customer\Job();
    $job->setTitle($user['position']);
    $job->setCompany($user['company']);

    $customer->addJob($job);

    $badge = new Objects\Badge();
    $badge->setCampaignId($campaign->getId());
    $badge->setBadgeTypeId($badgeType->getId());
    $badge->setStatus('active');

    $customer->addBadge($badge);

    print 'IMPORTED: ' . $customer->getFirstName() . ' ' . $customer->getLastName() . PHP_EOL;
    (new \Buzz\Control\Services\CustomerService($buzz))->save($customer);
}
