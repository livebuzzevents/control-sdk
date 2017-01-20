<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

/**
 * Class AnswerService
 *
 * @package Buzz\Control\Services\Customer
 */
class AnswerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer\Answer::class;

    /**
     * @param Customer        $customer
     * @param Customer\Answer $answer
     *
     * @return Customer\Answer[]
     * @throws ErrorException
     */
    public function get(Customer $customer, Customer\Answer $answer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Customer        $customer
     * @param Customer\Answer $answer
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer, Customer\Answer $answer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$answer->getId()) {
            throw new ErrorException('Answer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/answer/{$answer->getId()}");
    }

    /**
     * @param Customer        $customer
     * @param Customer\Answer $answer
     *
     * @return Customer\Answer[]
     * @throws ErrorException
     */
    public function save(Customer $customer, Customer\Answer $answer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
            throw new ErrorException('Answer id or Question id required!');
        }

        if ($answer->getId()) {
            $verb = 'put';
            $url  = "customer/{$customer->getId()}/answer/{$answer->getId()}";
        } else {
            $verb = 'post';
            $url  = "customer/{$customer->getId()}/answer";
        }

        return $this->callAndCast($verb, $url, $answer->toArray());
    }

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function deleteMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/answers");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer\Answer[]
     * @throws ErrorException
     */
    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/answers");
    }

    /**
     * @param Customer          $customer
     * @param Customer\Answer[] $answers
     * @param array             $rules
     *
     * @return Customer\Answer[]
     * @throws ErrorException
     */
    public function saveMany(Customer $customer, array $answers, array $rules)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        foreach ($answers as $key => $answer) {
            if (!$answer->getId() && !$answer->getQuestionId() && !$answer->getQuestion()) {
                throw new ErrorException('Answer id or Question id required!');
            }

            $answers[$key] = $answer->toArray();
        }

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/answers", [
            'batch' => $answers,
            'rules' => $rules,
        ]);
    }
}
