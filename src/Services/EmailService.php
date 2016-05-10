<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\EmailTemplate;
use Buzz\Control\Objects\Exhibitor;

/**
 * Class EmailService
 *
 * @package Buzz\Control\Services
 */
class EmailService extends Service
{
    /**
     * @param Customer      $customer
     * @param EmailTemplate $emailTemplate
     * @param array         $settings
     *
     * @throws ErrorException
     */
    public function sendToCustomer(Customer $customer, EmailTemplate $emailTemplate, array $settings = [])
    {
        if ((!$emailTemplate->getId() && !$emailTemplate->getIdentifier()) && !$customer->getId()) {
            throw new ErrorException('Email and Customer required!');
        }

        $request = $settings;

        $request['customer_id'] = $customer->getId();

        if ($emailTemplate->getId()) {
            $request['email_template_id'] = $emailTemplate->getId();
        } else {
            $request['email_template'] = $emailTemplate->toArray();
        }

        $this->call('post', 'email/send', $request);
    }

    /**
     * @param Exhibitor     $exhibitor
     * @param EmailTemplate $emailTemplate
     * @param array         $settings
     *
     * @throws ErrorException
     * @internal param Customer $customer
     */
    public function sendToExhibitor(Exhibitor $exhibitor, EmailTemplate $emailTemplate, array $settings = [])
    {
        if ((!$emailTemplate->getId() && !$emailTemplate->getIdentifier()) && !$exhibitor->getId()) {
            throw new ErrorException('Email and Exhibitor required!');
        }

        $request = $settings;

        $request['exhibitor_id'] = $exhibitor->getId();

        if ($emailTemplate->getId()) {
            $request['email_template_id'] = $emailTemplate->getId();
        } else {
            $request['email_template'] = $emailTemplate->toArray();
        }

        $this->call('post', 'email/send', $request);
    }
}
