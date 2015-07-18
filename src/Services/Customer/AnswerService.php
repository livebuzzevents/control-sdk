<?php namespace Buzz\Control\Services\Customer;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Services\Service;

class AnswerService extends Service
{
    protected static $cast = Customer\Answer::class;

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

    public function deleteMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}/answers");
    }

    public function getMany(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCastMany('get', "customer/{$customer->getId()}/answers");
    }

    public function saveMany(Customer $customer, array $answers)
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

        return $this->callAndCastMany('post', "customer/{$customer->getId()}/answers", ['batch' => $answers]);
    }
}