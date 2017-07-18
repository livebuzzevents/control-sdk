<?php

namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Lead;
use Buzz\Control\Objects\SmsMessageTemplate;

/**
 * Class SmsService
 *
 * @package Buzz\Control\Services
 */
class SmsService extends Service
{
    /**
     * @param Customer $customer
     * @param SmsMessageTemplate $smsMessageTemplate
     * @param array $settings
     *
     * @throws ErrorException
     */
    public function sendToCustomer(Customer $customer, SmsMessageTemplate $smsMessageTemplate, array $settings = [])
    {
        if ((!$smsMessageTemplate->getId() && !$smsMessageTemplate->getIdentifier()) && !$customer->getId()) {
            throw new ErrorException('Sms and Customer required!');
        }

        $request = $settings;

        $request['customer_id'] = $customer->getId();

        if ($smsMessageTemplate->getId()) {
            $request['sms_message_template_id'] = $smsMessageTemplate->getId();
        } else {
            $request['sms_message_template'] = $smsMessageTemplate->toArray();
        }

        $this->call('post', 'sms-message/send', $request);
    }

    /**
     * @param Exhibitor $exhibitor
     * @param SmsMessageTemplate $smsMessageTemplate
     * @param array $settings
     *
     * @throws ErrorException
     */
    public function sendToExhibitor(Exhibitor $exhibitor, SmsMessageTemplate $smsMessageTemplate, array $settings = [])
    {
        if ((!$smsMessageTemplate->getId() && !$smsMessageTemplate->getIdentifier()) && !$exhibitor->getId()) {
            throw new ErrorException('Sms and Exhibitor required!');
        }

        $request = $settings;

        $request['exhibitor_id'] = $exhibitor->getId();

        if ($smsMessageTemplate->getId()) {
            $request['sms_message_template_id'] = $smsMessageTemplate->getId();
        } else {
            $request['sms_message_template'] = $smsMessageTemplate->toArray();
        }

        $this->call('post', 'sms-message/send', $request);
    }

    /**
     * @param Lead $lead
     * @param SmsMessageTemplate $smsMessageTemplate
     * @param array $settings
     *
     * @throws ErrorException
     */
    public function sendToLead(Lead $lead, SmsMessageTemplate $smsMessageTemplate, array $settings = [])
    {
        if ((!$smsMessageTemplate->getId() && !$smsMessageTemplate->getIdentifier()) && !$lead->getId()) {
            throw new ErrorException('Sms and Lead required!');
        }

        $request = $settings;

        $request['lead_id'] = $lead->getId();

        if ($smsMessageTemplate->getId()) {
            $request['sms_message_template_id'] = $smsMessageTemplate->getId();
        } else {
            $request['sms_message_template'] = $smsMessageTemplate->toArray();
        }

        $this->call('post', 'sms-message/send', $request);
    }
}
