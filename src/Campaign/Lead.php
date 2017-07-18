<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Service;
use JTDSoft\EssentialsSdk\Core\Cast;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Lead
 *
 * @property string $group_id
 * @property string $import_id
 * @property-read string $avatar
 * @property string $identifier
 * @property string $email
 * @property string $source
 * @property string $source_id
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
 * @property string $is_a_clone
 * @property string $cloned_id
 * @property string $cloned_type
 * @property string $cloned_campaign_id
 * @property array $details
 * @property \DateTime $expires_at
 *
 * @property-read \Buzz\Control\Campaign\LeadGroup $group
 * @property-read \Buzz\Control\Campaign\Address[] $addresses
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\EmailMessage[] $email_messages
 * @property-read \Buzz\Control\Campaign\File[] $files
 * @property-read \Buzz\Control\Campaign\Import $import
 * @property-read \Buzz\Control\Campaign\Link[] $links
 * @property-read \Buzz\Control\Campaign\Log[] $logs
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 * @property-read \Buzz\Control\Campaign\Phone[] $phones
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\SmsMessage[] $sms_messages
 * @property-read \Buzz\Control\Campaign\Social[] $socials
 * @property-read \Buzz\Control\Campaign\ModelTag[] $tags
 *
 */
class Lead extends Object
{
    public static function find(string $id, array $expand = []): ?Lead
    {
        return Cast::single(self::class, (new Service())->get("leads/{$id}", compact('expand')));
    }

    public static function first(array $expand = [], array $options = []): ?Lead
    {
        return self::get($expand, $options)->first();
    }

    public static function get(array $expand = [], array $options = []): Collection
    {
        return Cast::many(self::class, (new Service())->get("leads", compact('expand', 'options')));
    }

    public static function saveMany($leads, array $expand = [])
    {
        return Cast::many(self::class, (new Service())->post("leads", $leads + compact('expand')));
    }

    public static function deleteMany(array $options = [])
    {
        return (new Service())->delete("leads", compact('options'));
    }

    public static function create(array $attributes)
    {
        $lead = (new self($attributes));

        $lead->save();

        return $lead;
    }

    public function save()
    {
        if ($this->id) {
            $this->copyFromArray(
                (new Service())->put("leads/{$this->id}", $this->data + compact('expand'))
            );
        } else {
            $this->copyFromArray(
                (new Service())->post("leads", $this->data + compact('expand'))
            );
        }
    }

    public static function login(array $credentials)
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

        return Cast::single(self::class, (new Service())->get("leads/login", $credentials));
    }

    public function delete()
    {
        return (new Service())->delete("leads/{$this->id}");
    }
}
