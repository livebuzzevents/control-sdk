<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;
use Buzz\Control\Service;
use JTDSoft\EssentialsSdk\Core\Cast;
use JTDSoft\EssentialsSdk\Core\Collection;

/**
 * Class Exhibitor
 *
 * @property string $import_id
 * @property string $owner_id
 * @property string $publish
 * @property string $avatar
 * @property string $identifier
 * @property string $name
 * @property string $exhibiting_name
 * @property string $source
 * @property string $source_id
 * @property string $website
 * @property array $details
 * @property array $settings
 * @property array $stands
 * @property string $status
 * @property string $is_a_clone
 * @property string $cloned_id
 * @property string $cloned_type
 * @property string $cloned_campaign_id
 *
 * @property-read \Buzz\Control\Campaign\Address[] $addresses
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\Basket $basket
 * @property-read \Buzz\Control\Campaign\Baskets[] $baskets
 * @property-read \Buzz\Control\Campaign\Invite[] $created_invites
 * @property-read \Buzz\Control\Campaign\Vote[] $created_votes
 * @property-read \Buzz\Control\Campaign\Exhibitor $owner
 * @property-read \Buzz\Control\Campaign\File[] $files
 * @property-read \Buzz\Control\Campaign\Import $import
 * @property-read \Buzz\Control\Campaign\Invite[] $invites
 * @property-read \Buzz\Control\Campaign\Link[] $links
 * @property-read \Buzz\Control\Campaign\Log[] $logs
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 * @property-read \Buzz\Control\Campaign\Order[] $orders
 * @property-read \Buzz\Control\Campaign\Phone[] $phones
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\Scanner[] $scanners
 * @property-read \Buzz\Control\Campaign\Scan[] $scans
 * @property-read \Buzz\Control\Campaign\StreamPageActivity[] $stream_page_activities
 * @property-read \Buzz\Control\Campaign\ExhibitorPressRelease[] $press_releases
 * @property-read \Buzz\Control\Campaign\ModelTag[] $tags
 * @property-read \Buzz\Control\Campaign\Vote[] $votes
 * @property-read \Buzz\Control\Campaign\Question[] $questions
 * @property-read \Buzz\Control\Campaign\Product[] $products
 * @property-read \Buzz\Control\Campaign\Customer $main_contact
 * @property-read \Buzz\Control\Campaign\Customer[] $customers
 *
 */
class Exhibitor extends Object
{
    public static function find(string $id, array $expand = []): ?Exhibitor
    {
        return Cast::single(self::class, (new Service())->get("exhibitors/{$id}", compact('expand')));
    }

    public static function first(array $expand = [], array $options = []): ?Exhibitor
    {
        return self::get($expand, $options)->first();
    }

    public static function get(array $expand = [], array $options = []): Collection
    {
        return Cast::many(self::class, (new Service())->get("exhibitors", compact('expand', 'options')));
    }

    public static function saveMany($exhibitors, array $expand = [])
    {
        return Cast::many(self::class, (new Service())->post("exhibitors", $exhibitors + compact('expand')));
    }

    public static function deleteMany(array $options = [])
    {
        return (new Service())->delete("exhibitors", compact('options'));
    }

    public static function create(array $attributes)
    {
        $exhibitor = (new self($attributes));

        $exhibitor->save();

        return $exhibitor;
    }

    public function save()
    {
        if ($this->id) {
            $this->copyFromArray(
                (new Service())->put("exhibitors/{$this->id}", $this->data + compact('expand'))
            );
        } else {
            $this->copyFromArray(
                (new Service())->post("exhibitors", $this->data + compact('expand'))
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

        return Cast::single(self::class, (new Service())->get("exhibitors/login", $credentials));
    }

    public function delete()
    {
        return (new Service())->delete("exhibitors/{$this->id}");
    }
}
