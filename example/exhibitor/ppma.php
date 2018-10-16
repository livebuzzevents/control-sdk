<?php

require_once '../bootstrap.php';

$questionOptionService = new \Buzz\Control\Services\QuestionOptionService($buzz);

$exhibitorsByQuestionOptionId = $questionOptionService
    ->where('question.identifier', 'starts with', 'exhibitor-profile-categories-')
    ->where('answerOptions.answer.exhibitor', 'has')
    ->with('question', 'answerOptions.answer.exhibitor')
//    ->perPage(10)
//    ->getMany()
    ->perPage(500)
    ->getAll()
    ->keyBy('id')
    ->map(function ($item) {
        $exhibitors = [];

        foreach ($item->answer_options as $answerOption) {
            if ($answerOption->answer->exhibitor->publish == 'yes') {
                $stands = $answerOption->answer->exhibitor->stands;

                natsort($stands);

                $exhibitors[] = [
                    'name' => $answerOption->answer->exhibitor->name,
                    'stand' => implode('/', $stands)
                ];
            }
        }

        uasort($exhibitors, function ($a, $b) {
            return strnatcmp($a['name'], $b['name']);
        });

        return $exhibitors;
    });

$questionService = new \Buzz\Control\Services\QuestionService($buzz);

$questions = $questionService
    ->where('identifier', 'starts with', 'exhibitor-profile-categories-')
    ->where('active', 'is', 'yes')
    ->with('options')
    ->getAll()
    ->keyBy('identifier');

$profileCategoryQuestions = [
    'exhibitor-profile-categories-magazine-services',
    'exhibitor-profile-categories-ancillary',
    'exhibitor-profile-categories-contract-packaging',
    'exhibitor-profile-categories-materials-containers',
    'exhibitor-profile-categories-process',
    'exhibitor-profile-categories-packaging',
];

?>
    <style>
        table {
            font-family: "Century Gothic", CenturyGothic, Geneva, AppleGothic, sans-serif;
            font-size: 16px;
            text-transform: uppercase;
        }

        .legend td {
            font-size: 1.5em;
            font-weight: bold;
            color: #ef7d00;
        }

        .primary-heading td,
        .secondary-heading td,
        .tertiary-heading td {
            font-weight: bold;
            color: #031835;
        }

        .primary-heading td {
            font-size: 24pt;
            font-family: "Times New Roman", Times, serif;
        }

        .secondary-heading td {
            font-size: 1.2em;
            font-family: "Courier New", Courier, monospace;
        }

        .tertiary-heading td {
            font-size: 1em;
            font-family: Impact, Charcoal, sans-serif;
        }

        .no-exhibitor {
            font-style: italic;
        }
    </style>
<?php

echo "<table><tr class=\"legend\"><td>Exhibitor title</td><td>Stand</td></tr>\n";

$i = 0;

foreach ($profileCategoryQuestions as $profileCategoryQuestion) {
    $question = $questions[$profileCategoryQuestion];

    $options = $question->options->sort(function ($a, $b) {
        return strnatcmp($a->getBody(), $b->getBody());
    });

    // primary heading
//    echo "==" . $question->getBody() . "\n";
    if ($i++ > 0) {
        echo "<tr class=\"spacing\"><td colspan=\"2\">&nbsp;</td></tr>\n";
    }

    echo "<tr class=\"primary-heading\"><td colspan=\"2\">" . $question->getBody() . "</td></tr>\n";

    foreach ($options as $option) {
        echo "\n";

        // secondary heading
//        echo "==--" . $option->getBody() . "\n";
        echo "<tr class=\"spacing\"><td colspan=\"2\">&nbsp;</td></tr>\n";
        echo "<tr class=\"secondary-heading\"><td colspan=\"2\">" . $option->getBody() . "</td></tr>\n";

        if (isset($questions[$question->identifier . '-' . $option->identifier])) {
            $subQuestion = $questions[$question->identifier . '-' . $option->identifier];

            $subQuestionOptions = $subQuestion->options->sort(function ($a, $b) {
                return strnatcmp($a->getBody(), $b->getBody());
            });

            foreach ($subQuestionOptions as $subOption) {
                echo "\n";

                // tertiary heading
//                echo "==--==" . $subOption->getBody() . "\n";
//                echo "<tr class=\"spacing\"><td colspan=\"2\">&nbsp;</td></tr>\n";
                echo "<tr class=\"tertiary-heading\"><td colspan=\"2\">" . $subOption->getBody() . "</td></tr>\n";

                if (isset($exhibitorsByQuestionOptionId[$subOption->id])) {
                    foreach ($exhibitorsByQuestionOptionId[$subOption->id] as $exhibitor) {
//                        echo $exhibitor . "\n";
                        echo "<tr class=\"exhibitor\"><td>" . $exhibitor['name'] . "</td><td>" . $exhibitor['stand'] . "</td></tr>\n";
                    }
                } else {
                    echo "<tr class=\"no-exhibitor\"><td colspan=\"2\">No exhibitors</td></tr>\n";
                }
            }
        } else {
            if (isset($exhibitorsByQuestionOptionId[$option->id])) {
                foreach ($exhibitorsByQuestionOptionId[$option->id] as $exhibitor) {
//                echo $exhibitor . "\n";
                    echo "<tr class=\"exhibitor\"><td>" . $exhibitor['name'] . "</td><td>" . $exhibitor['stand'] . "</td></tr>\n";
                }
            } else {
                echo "<tr class=\"no-exhibitor\"><td colspan=\"2\">No exhibitors</td></tr>\n";
            }
        }
    }

    echo "\n";
}
