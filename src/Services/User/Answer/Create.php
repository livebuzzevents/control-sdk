<?php namespace Buzz\Control\Services\User\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Question;
use Buzz\Control\Objects\User;

class Create implements Service
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Answer
     */
    private $question;
    /**
     * @var Campaign
     */
    private $campaign;
    /**
     * @var array
     */
    private $answer;

    /**
     * @param User     $user
     * @param Campaign $campaign
     * @param Question $question
     * @param array    $answer
     *
     * @throws ErrorException
     */
    public function __construct(User $user, Campaign $campaign, Question $question, array $answer)
    {
        if (empty($user->getId())) {
            throw new ErrorException('User id required!');
        }

        if (empty($campaign->getId())) {
            throw new ErrorException('Campaign id required!');
        }

        if (empty($question->getId())) {
            throw new ErrorException('Question id required!');
        }

        if (empty($answer)) {
            throw new ErrorException('Answer required!');
        }

        $this->user     = $user;
        $this->campaign = $campaign;
        $this->question = $question;
        $this->answer   = $answer;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "user/{$this->user->getId()}/answer/{$this->campaign->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return ['question_id' => $this->question->getId()] + $this->answer;
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        $decorated = [];
        foreach ($response as $answer) {
            $answer['question'] = Question::createFromArray($answer['question']);

            if (!empty($answer['question_option'])) {
                $answer['question_option'] = Question\Option::createFromArray($answer['question_option']);
            }

            array_push($decorated, User\Answer::createFromArray($answer));
        }

        return $decorated;
    }
}