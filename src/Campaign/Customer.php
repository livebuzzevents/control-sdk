<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Customer
 *
 * @property string $exhibitor_id
 * @property string $import_id
 * @property string $badge_type_id
 * @property string $owner_id
 * @property string $publish
 * @property bool $is_managed
 * @property bool $manages_customers
 * @property-read int $managed_customers_count
 * @property-read string $avatar
 * @property string $identifier
 * @property string $email
 * @property string $source
 * @property string $source_id
 * @property string $biography
 * @property string $barcode
 * @property-read string $qrcode
 * @property string $exhibitor_role
 * @property string $username
 * @property-read bool $has_password
 * @property string $password
 * @property string $title
 * @property-read string $name
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $job_title
 * @property string $company
 * @property string $sex
 * @property string $language
 * @property string $nationality
 * @property string $status
 * @property string $registration_type
 * @property string $registration_social_provider
 * @property string $attended
 * @property-read bool $printable
 * @property bool $badge_printed
 * @property bool $badge_preprinted
 * @property bool $badge_printed_onsite
 * @property bool $badge_viewed
 * @property string $is_a_clone
 * @property string $cloned_id
 * @property string $cloned_type
 * @property string $cloned_campaign_id
 * @property string $remember_token
 * @property-read \Buzz\Control\Campaign\CustomerAffiliate[] $affiliates
 * @property-read \Buzz\Control\Campaign\Address[] $addresses
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\BadgePrint[] $badge_prints
 * @property-read \Buzz\Control\Campaign\BadgeType $badge_type
 * @property-read \Buzz\Control\Campaign\BadgeView[] $badge_views
 * @property-read \Buzz\Control\Campaign\Basket $basket
 * @property-read \Buzz\Control\Campaign\Basket[] $baskets
 * @property-read \Buzz\Control\Campaign\Balance[] $balances
 * @property-read \Buzz\Control\Campaign\Charge[] $charges
 * @property-read \Buzz\Control\Campaign\Customer[] $created_customers
 * @property-read \Buzz\Control\Campaign\Invite[] $created_invites
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $created_seminars
 * @property-read \Buzz\Control\Campaign\Vote[] $created_votes
 * @property-read \Buzz\Control\Campaign\EmailMessage[] $email_messages
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\CustomerFlow $flow
 * @property-read \Buzz\Control\Campaign\CustomerFlow[] $flows
 * @property-read \Buzz\Control\Campaign\File[] $files
 * @property-read \Buzz\Control\Campaign\Import $import
 * @property-read \Buzz\Control\Campaign\Invite[] $invites
 * @property-read \Buzz\Control\Campaign\Link[] $links
 * @property-read \Buzz\Control\Campaign\CustomerLoginToken[] $login_tokens
 * @property-read \Buzz\Control\Campaign\Log[] $logs
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 * @property-read \Buzz\Control\Campaign\Order[] $orders
 * @property-read \Buzz\Control\Campaign\OrderProduct[] $order_products
 * @property-read \Buzz\Control\Campaign\Customer $owner
 * @property-read \Buzz\Control\Campaign\CustomerPasswordReset[] $password_resets
 * @property-read \Buzz\Control\Campaign\Phone[] $phones
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\SmsMessage[] $sms_messages
 * @property-read \Buzz\Control\Campaign\Social[] $socials
 * @property-read \Buzz\Control\Campaign\Scanner[] $scanners
 * @property-read \Buzz\Control\Campaign\SocialToken[] $social_tokens
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $seminars
 * @property-read \Buzz\Control\Campaign\Scan[] $scans
 * @property-read \Buzz\Control\Campaign\StreamPageActivity[] $stream_page_activities
 * @property-read \Buzz\Control\Campaign\ModelTag[] $tags
 * @property-read \Buzz\Control\Campaign\Vote[] $votes
 * @property-read \Buzz\Control\Campaign\BadgePrint[] $queued_badge_prints
 *
 */
class Customer extends Object
{
    public function login(array $credentials)
    {
        $user_information = [
            'user_agent'      => !empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null,
            'accept_language' => !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : null,
        ];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $user_information['x_ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $user_information['ip'] = $_SERVER['REMOTE_ADDR'];
        }

        $credentials['user_information'] = $user_information;

        return new self($this->api()->get($this->getEndpoint('login'), $credentials));
    }

    public function create(array $attributes): Customer
    {
        return $this->_create($attributes);
    }

    public function save(): void
    {
        $this->_save();
    }

    public function get(array $filters = [], $page = 1, $per_page = 50): Collection
    {
        return $this->_get($filters, $page, $per_page);
    }

    public function first(array $filters = []): ?Customer
    {
        return $this->_first($filters);
    }

    public function find(string $id): ?Customer
    {
        return $this->_find($id);
    }

    public function delete(): void
    {
        $this->_delete();
    }

    public function reload(): void
    {
        $this->_reload();
    }
}
