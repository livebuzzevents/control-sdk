<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Services\Service;

/**
 * Class AnswerService
 *
 * @package Buzz\Control\Services\Exhibitor
 */
class AnswerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Exhibitor\Answer::class;

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Answer $answer
     *
     * @return Exhibitor\Answer[]
     * @throws ErrorException
     */
    public function get(Exhibitor $exhibitor, Exhibitor\Answer $answer)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        return $this->callAndCast('get', "exhibitor/{$exhibitor->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Answer $answer
     *
     * @throws ErrorException
     */
    public function delete(Exhibitor $exhibitor, Exhibitor\Answer $answer)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Answer $answer
     *
     * @return Exhibitor\Answer[]
     * @throws ErrorException
     */
    public function save(Exhibitor $exhibitor, Exhibitor\Answer $answer)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
            throw new ErrorException('Answer id or Question id required!');
        }

        if ($answer->getId()) {
            $verb = 'put';
            $url  = "exhibitor/{$exhibitor->getId()}/answer/{$answer->getId()}";
        } else {
            $verb = 'post';
            $url  = "exhibitor/{$exhibitor->getId()}/answer";
        }

        return $this->callAndCast($verb, $url, $answer->toArray());
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @throws ErrorException
     */
    public function deleteMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        $this->call('delete', "exhibitor/{$exhibitor->getId()}/answers");
    }

    /**
     * @param Exhibitor $exhibitor
     *
     * @return Exhibitor\Answer[]
     * @throws ErrorException
     */
    public function getMany(Exhibitor $exhibitor)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        return $this->callAndCastMany('get', "exhibitor/{$exhibitor->getId()}/answers");
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Exhibitor\Answer[] $answers
     *
     * @return Exhibitor\Answer[]
     * @throws ErrorException
     */
    public function saveMany(Exhibitor $exhibitor, array $answers)
    {
        if (!$exhibitor->getId()) {
            throw new ErrorException('Exhibitor id required!');
        }

        foreach ($answers as $key => $answer) {
            if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
                throw new ErrorException('Answer id or Question id required!');
            }

            $answers[$key] = $answer->toArray();
        }

        return $this->callAndCastMany('post', "exhibitor/{$exhibitor->getId()}/answers", ['batch' => $answers]);
    }
}
