<?php namespace Buzz\Control\Services\Badge\Answer;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;

/**
 * Class SaveMany
 *
 * @package Buzz\Control\Services\Badge\Answer
 */
class SaveMany implements Service
{
    /**
     * @var Badge
     */
    private $badge;
    /**
     * @var Badge\Answer[]
     */
    private $answers;

    /**
     * @param Badge          $badge
     * @param Badge\Answer[] $answers
     *
     * @throws ErrorException
     */
    public function __construct(Badge $badge, $answers)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        foreach ($answers as $answer) {
            if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
                throw new ErrorException('Answer id or Question id required!');
            }
        }

        $this->badge   = $badge;
        $this->answers = $answers;
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
        return "badge/{$this->badge->getId()}/answers";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        foreach ($this->answers as &$answer) {
            $answer = $answer->toArray();
        }

        return ['batch' => $this->answers];
    }

    /**
     * @param $response
     *
     * @return mixed
     */
    public function decorate($response)
    {
        return Badge\Answer::createFromArray($response);
    }
}