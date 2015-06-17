<?php namespace Buzz\Control\Services\Question;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Question;

class Update implements Service
{
    /**
     * @var Question
     */
    private $question;

    public function __construct(Question $question)
    {
        if (empty($question->getId())) {
            throw new ErrorException('Question id required!');
        }

        $this->question = $question;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'put';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "question/{$this->question->getId()}";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        return $this->question->toArray();
    }

    public function decorate($response)
    {
        if (!empty($response['options'])) {
            foreach ($response['options'] as &$option) {
                $option = Question\Option::createFromArray($option);
            }
        }

        return Question::createFromArray($response);
    }
}