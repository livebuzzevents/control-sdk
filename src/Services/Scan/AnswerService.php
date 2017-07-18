<?php namespace Buzz\Control\Services\Scan;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Scan;
use Buzz\Control\Services\Service;

/**
 * Class AnswerService
 *
 * @package Buzz\Control\Services\Scan
 */
class AnswerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Scan\Answer::class;

    /**
     * @param Scan $scan
     * @param Scan\Answer $answer
     *
     * @return Scan\Answer[]
     * @throws ErrorException
     */
    public function get(Scan $scan, Scan\Answer $answer)
    {
        if (!$scan->getId()) {
            throw new ErrorException('Scan id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        return $this->callAndCast('get', "scan/{$scan->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Scan $scan
     * @param Scan\Answer $answer
     *
     * @throws ErrorException
     */
    public function delete(Scan $scan, Scan\Answer $answer)
    {
        if (!$scan->getId()) {
            throw new ErrorException('Scan id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        $this->call('delete', "scan/{$scan->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Scan $scan
     * @param Scan\Answer $answer
     *
     * @return Scan\Answer[]
     * @throws ErrorException
     */
    public function save(Scan $scan, Scan\Answer $answer)
    {
        if (!$scan->getId()) {
            throw new ErrorException('Scan id required!');
        }

        if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
            throw new ErrorException('Answer id or Question id required!');
        }

        if ($answer->getId()) {
            $verb = 'put';
            $url  = "scan/{$scan->getId()}/answer/{$answer->getId()}";
        } else {
            $verb = 'post';
            $url  = "scan/{$scan->getId()}/answer";
        }

        return $this->callAndCast($verb, $url, $answer->toArray());
    }

    /**
     * @param Scan $scan
     *
     * @throws ErrorException
     */
    public function deleteMany(Scan $scan)
    {
        if (!$scan->getId()) {
            throw new ErrorException('Scan id required!');
        }

        $this->call('delete', "scan/{$scan->getId()}/answers");
    }

    /**
     * @param Scan $scan
     *
     * @return Scan\Answer[]
     * @throws ErrorException
     */
    public function getMany(Scan $scan)
    {
        if (!$scan->getId()) {
            throw new ErrorException('Scan id required!');
        }

        return $this->callAndCastMany('get', "scan/{$scan->getId()}/answers");
    }

    /**
     * @param Scan $scan
     * @param Scan\Answer[] $answers
     *
     * @return Scan\Answer[]
     * @throws ErrorException
     */
    public function saveMany(Scan $scan, array $answers)
    {
        if (!$scan->getId()) {
            throw new ErrorException('Scan id required!');
        }

        foreach ($answers as $key => $answer) {
            if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
                throw new ErrorException('Answer id or Question id required!');
            }

            $answers[$key] = $answer->toArray();
        }

        return $this->callAndCastMany('post', "scan/{$scan->getId()}/answers", ['batch' => $answers]);
    }
}
