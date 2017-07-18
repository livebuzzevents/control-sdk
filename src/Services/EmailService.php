<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\EmailMessageTemplate;
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
     * @param EmailMessageTemplate $emailMessageTemplate
     * @param array $settings
     *
     * @throws ErrorException
     */
    public function sendToCustomer(Customer $customer, EmailMessageTemplate $emailMessageTemplate, array $settings = [])
    {
        if ((!$emailMessageTemplate->getId() && !$emailMessageTemplate->getIdentifier()) && !$customer->getId()) {
            throw new ErrorException('Email and Customer required!');
        }

        $request = $settings;

        $request['customer_id'] = $customer->getId();

        if ($emailMessageTemplate->getId()) {
            $request['email_message_template_id'] = $emailMessageTemplate->getId();
        } else {
            $request['email_message_template'] = $emailMessageTemplate->toArray();
        }

        $this->call('post', 'email-message/send', $request);
    }

    /**
     * @param Exhibitor $exhibitor
     * @param EmailMessageTemplate $emailMessageTemplate
     * @param array $settings
     *
     * @throws ErrorException
     * @internal param Customer $customer
     */
    public function sendToExhibitor(
        Exhibitor $exhibitor,
        EmailMessageTemplate $emailMessageTemplate,
        array $settings = []
    ) {
        if ((!$emailMessageTemplate->getId() && !$emailMessageTemplate->getIdentifier()) && !$exhibitor->getId()) {
            throw new ErrorException('Email and Exhibitor required!');
        }

        $request = $settings;

        $request['exhibitor_id'] = $exhibitor->getId();

        if ($emailMessageTemplate->getId()) {
            $request['email_message_template_id'] = $emailMessageTemplate->getId();
        } else {
            $request['email_message_template'] = $emailMessageTemplate->toArray();
        }

        $this->call('post', 'email-message/send', $request);
    }
}
