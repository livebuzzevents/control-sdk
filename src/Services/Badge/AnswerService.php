<?php namespace Buzz\Control\Services\Badge;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Services\Service;

/**
 * Class AnswerService
 *
 * @package Buzz\Control\Services\Badge
 */
class AnswerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Badge\Answer::class;

    /**
     * @param Badge        $badge
     * @param Badge\Answer $answer
     *
     * @return Badge\Answer[]
     * @throws ErrorException
     */
    public function get(Badge $badge, Badge\Answer $answer)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        return $this->callAndCast('get', "badge/{$badge->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Badge        $badge
     * @param Badge\Answer $answer
     *
     * @throws ErrorException
     */
    public function delete(Badge $badge, Badge\Answer $answer)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        $this->call('delete', "badge/{$badge->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Badge        $badge
     * @param Badge\Answer $answer
     *
     * @return Badge\Answer[]
     * @throws ErrorException
     */
    public function save(Badge $badge, Badge\Answer $answer)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
            throw new ErrorException('Answer id or Question id required!');
        }

        if ($answer->getId()) {
            $verb = 'put';
            $url  = "badge/{$badge->getId()}/answer/{$answer->getId()}";
        } else {
            $verb = 'post';
            $url  = "badge/{$badge->getId()}/answer";
        }

        return $this->callAndCast($verb, $url, $answer->toArray());
    }

    /**
     * @param Badge $badge
     *
     * @throws ErrorException
     */
    public function deleteMany(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->call('delete', "badge/{$badge->getId()}/answers");
    }

    /**
     * @param Badge $badge
     *
     * @return Badge\Answer[]
     * @throws ErrorException
     */
    public function getMany(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->callAndCastMany('get', "badge/{$badge->getId()}/answers");
    }

    /**
     * @param Badge          $badge
     * @param Badge\Answer[] $answers
     *
     * @return Badge\Answer[]
     * @throws ErrorException
     */
    public function saveMany(Badge $badge, array $answers)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        foreach ($answers as $key => $answer) {
            if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
                throw new ErrorException('Answer id or Question id required!');
            }

            $answers[$key] = $answer->toArray();
        }

        return $this->callAndCastMany('post', "badge/{$badge->getId()}/answers", ['batch' => $answers]);
    }
}