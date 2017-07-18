<?php namespace Buzz\Control\Services\Lead;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Lead;
use Buzz\Control\Services\Service;

/**
 * Class AnswerService
 *
 * @package Buzz\Control\Services\Lead
 */
class AnswerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Lead\Answer::class;

    /**
     * @param Lead $lead
     * @param Lead\Answer $answer
     *
     * @return Lead\Answer[]
     * @throws ErrorException
     */
    public function get(Lead $lead, Lead\Answer $answer)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        return $this->callAndCast('get', "lead/{$lead->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Lead $lead
     * @param Lead\Answer $answer
     *
     * @throws ErrorException
     */
    public function delete(Lead $lead, Lead\Answer $answer)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Lead $lead
     * @param Lead\Answer $answer
     *
     * @return Lead\Answer[]
     * @throws ErrorException
     */
    public function save(Lead $lead, Lead\Answer $answer)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
            throw new ErrorException('Answer id or Question id required!');
        }

        if ($answer->getId()) {
            $verb = 'put';
            $url  = "lead/{$lead->getId()}/answer/{$answer->getId()}";
        } else {
            $verb = 'post';
            $url  = "lead/{$lead->getId()}/answer";
        }

        return $this->callAndCast($verb, $url, $answer->toArray());
    }

    /**
     * @param Lead $lead
     *
     * @throws ErrorException
     */
    public function deleteMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/answers");
    }

    /**
     * @param Lead $lead
     *
     * @return Lead\Answer[]
     * @throws ErrorException
     */
    public function getMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->callAndCastMany('get', "lead/{$lead->getId()}/answers");
    }

    /**
     * @param Lead $lead
     * @param Lead\Answer[] $answers
     *
     * @return Lead\Answer[]
     * @throws ErrorException
     */
    public function saveMany(Lead $lead, array $answers)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        foreach ($answers as $key => $answer) {
            if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
                throw new ErrorException('Answer id or Question id required!');
            }

            $answers[$key] = $answer->toArray();
        }

        return $this->callAndCastMany('post', "lead/{$lead->getId()}/answers", ['batch' => $answers]);
    }
}
