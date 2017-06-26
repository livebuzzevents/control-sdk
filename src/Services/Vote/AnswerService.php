<?php namespace Buzz\Control\Services\Vote;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Vote;
use Buzz\Control\Services\Service;

/**
 * Class AnswerService
 *
 * @package Buzz\Control\Services\Vote
 */
class AnswerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Vote\Answer::class;

    /**
     * @param Vote        $vote
     * @param Vote\Answer $answer
     *
     * @return Vote\Answer[]
     * @throws ErrorException
     */
    public function get(Vote $vote, Vote\Answer $answer)
    {
        if (!$vote->getId()) {
            throw new ErrorException('Vote id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        return $this->callAndCast('get', "vote/{$vote->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Vote        $vote
     * @param Vote\Answer $answer
     *
     * @throws ErrorException
     */
    public function delete(Vote $vote, Vote\Answer $answer)
    {
        if (!$vote->getId()) {
            throw new ErrorException('Vote id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        $this->call('delete', "vote/{$vote->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Vote        $vote
     * @param Vote\Answer $answer
     *
     * @return Vote\Answer[]
     * @throws ErrorException
     */
    public function save(Vote $vote, Vote\Answer $answer)
    {
        if (!$vote->getId()) {
            throw new ErrorException('Vote id required!');
        }

        if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
            throw new ErrorException('Answer id or Question id required!');
        }

        if ($answer->getId()) {
            $verb = 'put';
            $url  = "vote/{$vote->getId()}/answer/{$answer->getId()}";
        } else {
            $verb = 'post';
            $url  = "vote/{$vote->getId()}/answer";
        }

        return $this->callAndCast($verb, $url, $answer->toArray());
    }

    /**
     * @param Vote $vote
     *
     * @throws ErrorException
     */
    public function deleteMany(Vote $vote)
    {
        if (!$vote->getId()) {
            throw new ErrorException('Vote id required!');
        }

        $this->call('delete', "vote/{$vote->getId()}/answers");
    }

    /**
     * @param Vote $vote
     *
     * @return Vote\Answer[]
     * @throws ErrorException
     */
    public function getMany(Vote $vote)
    {
        if (!$vote->getId()) {
            throw new ErrorException('Vote id required!');
        }

        return $this->callAndCastMany('get', "vote/{$vote->getId()}/answers");
    }

    /**
     * @param Vote          $vote
     * @param Vote\Answer[] $answers
     *
     * @return Vote\Answer[]
     * @throws ErrorException
     */
    public function saveMany(Vote $vote, array $answers)
    {
        if (!$vote->getId()) {
            throw new ErrorException('Vote id required!');
        }

        foreach ($answers as $key => $answer) {
            if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
                throw new ErrorException('Answer id or Question id required!');
            }

            $answers[$key] = $answer->toArray();
        }

        return $this->callAndCastMany('post', "vote/{$vote->getId()}/answers", ['batch' => $answers]);
    }
}