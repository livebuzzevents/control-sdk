<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Service;
use JTDSoft\EssentialsSdk\Core\Cast;
use JTDSoft\EssentialsSdk\Core\Collection;
use JTDSoft\EssentialsSdk\Core\Object;

/**
 * Class Exhibitor
 *
 * @property string    $exhibitor_id
 * @property string    $import_id
 * @property string    $badge_type_id
 * @property string    $owner_id
 * @property string    $publish
 * @property bool      $is_managed
 * @property bool      $manages_exhibitors
 * @property int       $managed_exhibitors_count
 * @property string    $identifier
 * @property string    $email
 * @property string    $source
 * @property string    $source_id
 * @property string    $biography
 * @property string    $barcode
 * @property string    $qrcode
 * @property string    $exhibitor_role
 * @property string    $username
 * @property bool      $has_password
 * @property string    $password
 * @property string    $title
 * @property string    $name
 * @property string    $first_name
 * @property string    $middle_name
 * @property string    $last_name
 * @property string    $job_title
 * @property string    $company
 * @property string    $sex
 * @property string    $language
 * @property string    $nationality
 * @property string    $status
 * @property string    $registration_type
 * @property string    $registration_social_provider
 * @property string    $attended
 * @property bool      $printable
 * @property bool      $badge_printed
 * @property bool      $badge_preprinted
 * @property bool      $badge_printed_onsite
 * @property bool      $badge_viewed
 * @property string    $is_a_clone
 * @property string    $cloned_id
 * @property string    $cloned_type
 * @property string    $cloned_campaign_id
 * @property string    $remember_token
 * @property \DateTime $updated_at
 * @property \DateTime $created_at
 *
 */
class Exhibitor extends Object
{
    public static function find(string $id, array $expand = []): ?Exhibitor
    {
        return Cast::single(self::class, (new Service())->get("exhibitors/{$id}", compact('expand')));
    }

    public static function get(array $expand = [], array $options = []): Collection
    {
        return Cast::many(self::class, (new Service())->get("exhibitors", compact('expand', 'options')));
    }

    public static function first(array $expand = [], array $options = []): ?Exhibitor
    {
        return self::get($expand, $options)->first();
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

    public function delete()
    {
        return (new Service())->delete("exhibitors/{$this->id}");
    }
}
