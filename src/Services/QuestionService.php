<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Question;

/**
 * Class QuestionService
 *
 * @package Buzz\Control\Services
 */
class QuestionService extends Service
{
    /**
     * @var
     */
    protected static $cast = Question::class;

    /**
     * @param Question $question
     *
     * @return Question
     * @throws ErrorException
     */
    public function get(Question $question)
    {
        if (!$question->getId()) {
            throw new ErrorException('Question id required!');
        }

        return $this->callAndCast('get', "question/{$question->getId()}");
    }

    /**
     * @param Question $question
     *
     * @throws ErrorException
     */
    public function delete(Question $question)
    {
        if (!$question->getId()) {
            throw new ErrorException('Question id required!');
        }

        $this->call('delete', "question/{$question->getId()}");
    }

    /**
     * @param Question $question
     *
     * @return Question
     * @throws ErrorException
     */
    public function save(Question $question)
    {
        if (!$question->getId() && !$question->getCampaignId()) {
            throw new ErrorException('Question id or Campaign id required!');
        }

        if ($question->getId()) {
            $verb = 'put';
            $url  = 'question/' . $question->getId();
        } else {
            $verb = 'post';
            $url  = 'question';
        }

        return $this->callAndCast($verb, $url, $question->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'questions');
    }

    /**
     * @return Question[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'questions');
    }

    /**
     * @param Question[] $questions
     *
     * @return Question[]
     * @throws ErrorException
     */
    public function saveMany(array $questions)
    {
        foreach ($questions as $key => $question) {
            if (!$question->getId() && !$question->getCampaignId()) {
                throw new ErrorException('Question id or Campaign id required!');
            }

            $questions[$key] = $question->toArray();
        }

        return $this->callAndCastMany('post', 'questions', ['batch' => $questions]);
    }
}