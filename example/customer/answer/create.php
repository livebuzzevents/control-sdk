<?php

require_once '../../bootstrap.php';

$customer = new \Buzz\Control\Objects\Customer(1);

//ANSWER SELECT AND RADIO
$answer = new \Buzz\Control\Objects\Customer\Answer();

$question = new \Buzz\Control\Objects\Question();
$question->setIdentifier('quaerat');

$answer->setQuestion($question);

$option = new \Buzz\Control\Objects\Customer\Answer\Option();

$question_option = new \Buzz\Control\Objects\Question\Option();
$question_option->setIdentifier('nihil');

$option->setQuestionOption($question_option);

$answer->addOption($option);

$service  = new \Buzz\Control\Services\Customer\Answer\Save($customer, $answer);
$response = $serviceHandler->execute($service);

var_dump($response);

//ANSWER CHECKBOX
//$question = new \Buzz\Control\Objects\Question(2);
//
//$answer = ['options' => [['id' => 6], ['id' => 7]]];
//
//$service  = new \Buzz\Control\Services\Customer\Answer\Create($customer, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);

//ANSWER OPEN
//$question = new \Buzz\Control\Objects\Question(3);
//
//$answer = ['answer' => 'example answer'];
//
//$service  = new \Buzz\Control\Services\Customer\Answer\Create($customer, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);

//ANSWER OPEN OPTION
//$question = new \Buzz\Control\Objects\Question(4);
//
//$answer = ['options' => [['id' => 11, 'answer' => 'example open answer']]];
//
//$service  = new \Buzz\Control\Services\Customer\Answer\Create($customer, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);