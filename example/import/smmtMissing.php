<?php

use Buzz\Control\Objects;

exit();

require_once '../bootstrap.php';

$badgeType = new Objects\BadgeType('6607a768-c7c2-4e58-a2dd-1c24ec960000');
$campaign  = new Objects\Campaign('dcff6aff-50e1-449f-8d4c-9a18421d0000');

$users = json_decode('[{"name":"Robert Aeis","position":false,"company":"Arrk Europe"},
{"name":"Glyness Aspley","position":false,"company":"Avon TSA Ltd"},
{"name":"Carlos Baeza","position":false,"company":"Faurecia"},
{"name":"Graham Bailey","position":false,"company":"Coleshill Plastics Ltd"},
{"name":"Jeremey Baskott","position":false,"company":"TS Teck UK Ltd"},
{"name":"David Bayliss","position":false,"company":"Victoria Forgings Co Ltd"},
{"name":"Michael Beese","position":false,"company":"Genex UK Ltd"},
{"name":"Francesca Brittain","position":false,"company":"Victoria Forgings Co Ltd"},
{"name":"Lucy Burrell","position":false,"company":"Ark Europe"},
{"name":"Geoff Buxton","position":false,"company":"B2 Automotive Components"},
{"name":"Philip Bytheway","position":false,"company":"Olympus Global"},
{"name":"Hamish Campbell","position":false,"company":"Kimber Mills"},
{"name":"Nick Carroll","position":false,"company":"WSBL Ltd"},
{"name":"Paul Chippendale","position":false,"company":"Industrial & Commerical Mouldings Ltd"},
{"name":"Crisdtiano Clemenza","position":false,"company":"Ferrari Technology Srl"},
{"name":"Lee Coburn","position":false,"company":"Avon TSA Ltd"},
{"name":"Barry Cole","position":false,"company":"KJ Ryan Ltd"},
{"name":"Tony Collins","position":false,"company":"Wickens Engineering Ltd"},
{"name":"Ray Collyer","position":false,"company":"Greenworld Electronics Ltd"},
{"name":"Claire Conibear","position":false,"company":"Goodridge Ltd"},
{"name":"Matthew Cooper","position":false,"company":"BMW UK Manufacturing Ltd"},
{"name":"Danny Crowe","position":false,"company":"Argus Fluidhandling Ltd"},
{"name":"Kristian Crowshaw","position":false,"company":"Gwent Cables"},
{"name":"Liam Cummins","position":false,"company":"Kirchhoff Automotive"},
{"name":"James Cushing","position":false,"company":"Broadwater Mouldings"},
{"name":"Arwel Davies","position":false,"company":"Mitsui Components Europe Ltd"},
{"name":"Sharon Baker","position":" Indirect Purchasing Project Buyer North Europe","company":" Faurecia Group"},
{"name":"Martin Bruene","position":" Business Development Director","company":" HBPO"},
{"name":"Ian Bulgin","position":" Warehouse Manager","company":" Espack Eurologistica SL"},
{"name":"Matthew Buliman","position":" Key Account Manager","company":" Goodridge Ltd"},
{"name":"Gerald Castell","position":" Senior Buyer","company":" Toyota Motor Europe"},
{"name":"Joseph Cond","position":" Account Manager","company":" VTL"},
{"name":"Richard Craig","position":" Business and Sales Development Manager UK","company":" Esab Group (UK) Ltd"},
{"name":"Mark Davis","position":" Plant Director","company":" Mitsui Components Europe Ltd"},
{"name":"Laura De Paz","position":" Buyer","company":" Toyota Motor Europe"},
{"name":"Philip Diamond","position":" Buyer","company":" Jaguar Land Rover"},
{"name":"Yash Dubai","position":" Business Associate","company":" Maxop Engineering"},
{"name":"Ross Dugmore","position":" Head of Purchasing and Logistics","company":" UK-NSI Co Ltd"},
{"name":"Iñaki Fernandez","position":" Chief Technology Officer","company":" Advanced Automotive Technologies Ltd"},
{"name":"Dean Fisher","position":" Director of European Sales","company":" Northern Automotive Systems"},
{"name":"Antonella Fossati","position":" Metal Buyer","company":" Bentley Motors Ltd"},
{"name":"Keith Gibbons","position":"   - Managing Director","company":"Gwent Cabbies"},
{"name":"Maxwell Gilchrist","position":" Director","company":" ATL Northeast Ltd"},
{"name":"Brian Glasshof","position":" Account Manager","company":" VTL"},
{"name":"Rick Göschel","position":" R & D Engineer","company":" Rehau AG & Co."},
{"name":"Michael Gougeon","position":" Marketing Director","company":" Valeo Service UK Ltd"},
{"name":"Matt Graves","position":" Buyer","company":" Jaguar Landrover"},
{"name":"Kieran Gray","position":" Purchasing","company":" Nissan Europe"},
{"name":"Chris Greenough","position":"Director","company":" Salop Design & Engineering"},
{"name":"Dale Hall","position":" Marketing","company":" Astra Engineering Products Ltd"},
{"name":"Colin Hanna","position":" Business Development Manager","company":" Sanmina-SCI Ltd"},
{"name":"Mike Hawes","position":" Chief Executive","company":" SMMT"},
{"name":"Jeremy Heaton","position":" Group Sales Director","company":" Covpress Ltd"},
{"name":"Carol Henderson","position":" Head of Engingeering and Admin","company":" Covpress Assembly Ltd"},
{"name":"Dean Jiggins","position":" Programme Purchasing Manager UK","company":" Lear Corporation (UK) Ltd"},
{"name":"Nicholas Jones","position":" Sales and Supply Manager","company":" BJ Seals Ltd"},
{"name":"Daniel Jones","position":" Marketing Analyst","company":" BJ Seals Ltd"},
{"name":"Paul Lackenby","position":"","company":""},
{"name":"Rosemary Lister","position":" Senior Manager","company":" Toyota Motor Europe"},
{"name":"Luca Loffa","position":" Project Manager","company":" Ferrari Technology Srl"},
{"name":"Alan Malcomson","position":" Engineering Manager","company":" Montupet Linamar"},
{"name":"Ian Marshall","position":" Head of Projects","company":" Fablink UK Ltd"},
{"name":"Carl Milbourne","position":" Head of Operations","company":" Covpress Assembly"},
{"name":"Steve Morley","position":" Project Director","company":" SERTEC group"},
{"name":"Ian Murray","position":" Sales Manager","company":" John McGavigan Ltd"},
{"name":"Katarzyna Pajak","position":" Senior Buyer","company":" Toyota Motor Europe"},
{"name":"Robert Palmer","position":" Managing Director","company":" Advanced Automotive Technologies Ltd"},
{"name":"Francesco Pastega","position":" Sales Manager","company":" SIRMAX SPA"},
{"name":"Mavroudis Patronis","position":" Buyer","company":" Jaguar Land Rover"},
{"name":"Adam Piggin","position":" Seats Buyer","company":" Nissan Europe"},
{"name":"Tony Plumb","position":" Business Development Manager","company":" APS Metal Pressing Ltd"},
{"name":"Gemma Podmore","position":" Trim Buyer","company":" Bentley Motors Ltd"},
{"name":"Mark Porter","position":" Buyer","company":" Jaguar Land Rover"},
{"name":"Angela Powers","position":" Buyer","company":" Faurecia Group"},
{"name":"Ingo Ribbeck","position":" Global Sales Manager","company":" Schneider Prototyping UK Ltd"},
{"name":"Kevin Ryan","position":" Managing Director","company":" KJ Ryan Ltd"},
{"name":"Henry Sarel-Cooke","position":" Business Development Manager","company":" GKN Autostructures Ltd"},
{"name":"Marlon Sharland","position":" Business Development Manager","company":" SCISYS"},
{"name":"Kim Sharratt","position":" Key Account Manager","company":" Buck & Hickman"},
{"name":"Paul Simpson -","position":" Team Leader End Users","company":"Omron"},
{"name":"Phil Spencer","position":" Sales & Business Development Director","company":" Voith Industrial Services Ltd"},
{"name":"Mark Stallard","position":" Technical Director","company":" Fern Plastic Products"},
{"name":"Matthew Taylor","position":" Senior Manager","company":" Mitsui Components Europe Ltd"},
{"name":"Allen Templeton","position":" Key Account Manager","company":" Creative Composites"},
{"name":"Tom Wamez","position":false,"company":"Toyota Motor Europe"},
{"name":"Marcus Weller","position":false,"company":"Aston Martin Lagonda"},
{"name":"Simon Whitehead","position":false,"company":"ICM Ltd"},
{"name":"Bill Whyte","position":false,"company":"Voith Industrial Services Ltd"},
{"name":"Mark Wingfield","position":false,"company":"A&M EDM Ltd"},
{"name":"Charles Dean","position":false,"company":"Fimark Ltd"},
{"name":"Neil Douglas","position":false,"company":"Sertec Group"},
{"name":"Josh Dudley-Tools","position":false,"company":"Frank Dudley Ltd"},
{"name":"Mike Edwards","position":false,"company":"JVC Kenwood UK Ltd"},
{"name":"Kira Edwards","position":false,"company":"Petford Group Ltd"},
{"name":"Andrew Essom","position":false,"company":"Rical Group"},
{"name":"Phil Everitt","position":false,"company":"Valeo Service UK Ltd"},
{"name":"Macartan Flanagan","position":false,"company":"Kongsberg Automotive"},
{"name":"Mike Flower","position":false,"company":"TP Engineering Ltd"},
{"name":"James Flynn","position":false,"company":"Argus Fluidhandling/Alfas Gomma"},
{"name":"Perry Freeman","position":false,"company":"Amphelnol Advanced Sensors"},
{"name":"Allan Gibbons","position":false,"company":"Omron Electronics Europe"},
{"name":"Terry Gilchrist","position":false,"company":"ATL Northeast Ltd"},
{"name":"Iain Graham","position":false,"company":"Fern Plastic Products"},
{"name":"P:aul Greenfield","position":false,"company":"LAP Electronics Ltd"},
{"name":"Stuart Gregory","position":false,"company":"Kongsberg Automotive"},
{"name":"Mark Goake","position":false,"company":"Glide"},
{"name":"James Hall","position":false,"company":"Astra Engineering Products Lts"},
{"name":"Jon Halliwell","position":false,"company":"Buck & Hickman"},
{"name":"Geoff Hancock","position":false,"company":"Northern Automotive Systems"},
{"name":"David Harris","position":false,"company":"Salop Design & Engineering"},
{"name":"Peter Harrop","position":false,"company":"IDTechEx"},
{"name":"Matt Harwood","position":false,"company":"Barkley Plastics Ltd"},
{"name":"Teresa Henry","position":false,"company":"IDTechEx"},
{"name":"Angela Henry","position":false,"company":"Priority Freight"},
{"name":"Chris Hill","position":false,"company":"Goodridge"},
{"name":"Dean Holt","position":false,"company":"Trim Technolgy"},
{"name":"Stevewn Holwell","position":false,"company":"Limecross"},
{"name":"Trevor Hoskins","position":false,"company":"Paintflow"},
{"name":"Chetnna Jain","position":false,"company":"Maxop Engineering"},
{"name":"Scott Jenner","position":false,"company":"Wurth Industrie Service"},
{"name":"Jin Woo Jeong","position":false,"company":"PKFC"},
{"name":"Brian Jones","position":false,"company":"BJ Seals"},
{"name":"Jeff Jones","position":false,"company":"Mitras Automotive"},
{"name":"Osamu Kawanobe","position":false,"company":"Mitsui Components"},
{"name":"Veraf Khambatta","position":false,"company":"Motorsense"},
{"name":"Matthew Kinsey","position":false,"company":"Ainscough Industrial Services"},
{"name":"Paul Knight","position":false,"company":"ARRK"},
{"name":"John Louden","position":false,"company":"Faurecia"},
{"name":"Greg Lynch","position":false,"company":"SMS Sigma"}]', true);

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

    if ($user['company']) {
        $job = new \Buzz\Control\Objects\Customer\Job();
        if ($user['position']) {
            $job->setTitle($user['position']);
        }
        $job->setCompany($user['company']);

        $customer->addJob($job);
    }

    $badge = new Objects\Badge();
    $badge->setCampaignId($campaign->getId());
    $badge->setBadgeTypeId($badgeType->getId());
    $badge->setStatus('active');

    $customer->addBadge($badge);

    print 'IMPORTED: ' . $customer->getFirstName() . ' ' . $customer->getLastName() . PHP_EOL;
    (new \Buzz\Control\Services\CustomerService($buzz))->save($customer);
}
