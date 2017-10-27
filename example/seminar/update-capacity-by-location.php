<?php

require_once '../bootstrap.php';

$capacity = [
    'Main Stage'          => 140,
    'AOP Lounge'          => 32,
    'Future Practice'     => 50,
    'Optical Academy'     => 50,
    'Dispensing Workshop' => 40,
    'Fashion Hub'         => 80,
    'Specsavers'          => 50,
    'Optos Stand'         => 30,
];

$seminarService = new \Buzz\Control\Services\SeminarService($buzz);

$seminarService->chunk(15, function ($seminars) use ($seminarService, $capacity) {
    foreach ($seminars as $seminar) {
        if (isset($capacity[$seminar->location])) {
            $seminarService->save((new \Buzz\Control\Objects\Seminar([
                'id'       => $seminar->id,
                'capacity' => $capacity[$seminar->location],
            ])));

            echo "Capacity updated for '" .
                $seminar->location .
                "' from " .
                (is_null($seminar->capacity) ? 'null' : $seminar->capacity) .
                " to " .
                $capacity[$seminar->location] .
                "\n";
        } else {
            echo "No capacity found for '" . $seminar->location . "' - not updated\n";
        }
    }
});

echo "Finished!";
