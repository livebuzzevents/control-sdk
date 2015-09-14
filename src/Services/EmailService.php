<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Email;
use Buzz\Control\Objects\Exhibitor;

/**
 * Class EmailService
 *
 * @package Buzz\Control\Services
 */
class EmailService extends Service
{
    /**
     * @param Customer $customer
     * @param Email    $email
     *
     * @throws ErrorException
     */
    public function sendToCustomer(Customer $customer, Email $email)
    {
        if ((!$email->getId() && !$email->getIdentifier()) && !$customer->getId()) {
            throw new ErrorException('Email and Customer required!');
        }

        $request = [
            'customer_id' => $customer->getId(),
        ];

        if ($email->getId()) {
            $request['email_id'] = $email->getId();
        } else {
            $request['email'] = $email->toArray();
        }

        $this->call('post', 'email/send', $request);
    }

    /**
     * @param Exhibitor $exhibitor
     * @param Email     $email
     *
     * @throws ErrorException
     * @internal param Customer $customer
     */
    public function sendToExhibitor(Exhibitor $exhibitor, Email $email)
    {
        if ((!$email->getId() && !$email->getIdentifier()) && !$exhibitor->getId()) {
            throw new ErrorException('Email and Exhibitor required!');
        }

        $request = [
            'exhibitor_id' => $exhibitor->getId(),
        ];

        if ($email->getId()) {
            $request['email_id'] = $email->getId();
        } else {
            $request['email'] = $email->toArray();
        }

        $this->call('post', 'email/send', $request);
    }
}
