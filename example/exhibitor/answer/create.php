<?php

require_once '../../bootstrap.php';

$exhibitor = new \Buzz\Control\Objects\Exhibitor(1);

//ANSWER SELECT AND RADIO
$answer = new \Buzz\Control\Objects\Exhibitor\Answer();
$answer->setQuestion(1, 'text');

$answer->addOption(2, '3');
$answer->addOption(3, '4');

var_dump($answer->toArray());exit();

$service  = new \Buzz\Control\Services\Exhibitor\Answer\Create($exhibitor, $answer);
$response = $serviceHandler->execute($service);

var_dump($response);

//ANSWER CHECKBOX
//$question = new \Buzz\Control\Objects\Question(2);
//
//$answer = ['options' => [['id' => 6], ['id' => 7]]];
//
//$service  = new \Buzz\Control\Services\Exhibitor\Answer\Create($exhibitor, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);

//ANSWER OPEN
//$question = new \Buzz\Control\Objects\Question(3);
//
//$answer = ['answer' => 'example answer'];
//
//$service  = new \Buzz\Control\Services\Exhibitor\Answer\Create($exhibitor, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);

//ANSWER OPEN OPTION
//$question = new \Buzz\Control\Objects\Question(4);
//
//$answer = ['options' => [['id' => 11, 'answer' => 'example open answer']]];
//
//$service  = new \Buzz\Control\Services\Exhibitor\Answer\Create($exhibitor, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);