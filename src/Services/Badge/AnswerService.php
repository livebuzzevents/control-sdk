<?php namespace Buzz\Control\Services\Badge;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Services\Service;

class AnswerService extends Service
{
    protected static $cast = Badge\Answer::class;

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

    public function deleteMany(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->call('delete', "badge/{$badge->getId()}/answers");
    }

    public function getMany(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->callAndCastMany('get', "badge/{$badge->getId()}/answers");
    }

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