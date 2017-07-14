<?php

require_once 'bootstrap.php';

set_time_limit(600);

$service = new \Buzz\Control\Services\CustomerService($buzz);

$answerService = new \Buzz\Control\Services\Customer\AnswerService($buzz);

/** @var \Buzz\Control\Objects\Customer[] $customers */
$customers = $service
    ->where('answers.options.questionOption.id', 'is', 'de2dd6a0-c347-446f-9bcc-a07191c50000')
    ->with('answers.options.questionOption', 'answers.question')
    ->perPage(10)
    ->getMany();

$answerMap = [
    'supply'      => [
        9012,
        1002,
        1003,
        9017,
        1004,
    ],
    'aftermarket' => [
        9001,
        9002,
        9007,
        9004,
        9005,
        9010,
        9009,
        9006,
        9011,
        9004,
        9008,
        9020,
    ],
];

foreach ($customers as $customer) {
    $jobRoleOptionsAnswers = $customer->getAnswerByIdentifier('job-role-options')->getOptions()->map(function ($item) {
        return $item->getQuestionOption()->getIdentifier();
    })->toArray();

    if (count($jobRoleOptionsAnswers) > 1) {
        throw new Error($customer->getId() . " has too many answers!");
    }

    $jobRoleOptionsAnswer = reset($jobRoleOptionsAnswers);

    $newAnswer = null;
    foreach ($answerMap as $answer => $options) {
        if (in_array((int)$jobRoleOptionsAnswer, $options)) {
            $newAnswer = $answer;
        }
    }

    if ($newAnswer) {
        $answer = new \Buzz\Control\Objects\Customer\Answer();

        $question = new \Buzz\Control\Objects\Question();
        $question->setIdentifier('job-role');

        $answer->setQuestion($question);

        $option = new \Buzz\Control\Objects\Customer\Answer\Option();

        $question_option = new \Buzz\Control\Objects\Question\Option();
        $question_option->setQuestion($question);
        $question_option->setIdentifier($newAnswer);

        $option->setQuestionOption($question_option);

        $answer->addOption($option);

        $answerService->save($customer, $answer);
    }
}
