<?php

require_once '../../bootstrap.php';

$user            = new \Buzz\Control\Objects\User(1);
$campaign        = new \Buzz\Control\Objects\Campaign(1);

//ANSWER SELECT AND RADIO
$question = new \Buzz\Control\Objects\Question(1);

$answer = ['options' => [['id' => 2]]];

$service  = new \Buzz\Control\Services\User\Answer\Create($user, $campaign, $question, $answer);
$response = $serviceHandler->execute($service);

var_dump($response);

//ANSWER CHECKBOX
//$question = new \Buzz\Control\Objects\Question(2);
//
//$answer = ['options' => [['id' => 6], ['id' => 7]]];
//
//$service  = new \Buzz\Control\Services\User\Answer\Create($user, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);

//ANSWER OPEN
//$question = new \Buzz\Control\Objects\Question(3);
//
//$answer = ['answer' => 'example answer'];
//
//$service  = new \Buzz\Control\Services\User\Answer\Create($user, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);

//ANSWER OPEN OPTION
//$question = new \Buzz\Control\Objects\Question(4);
//
//$answer = ['options' => [['id' => 11, 'answer' => 'example open answer']]];
//
//$service  = new \Buzz\Control\Services\User\Answer\Create($user, $campaign, $question, $answer);
//$response = $serviceHandler->execute($service);
//
//var_dump($response);