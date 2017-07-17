<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Service;
use JTDSoft\EssentialsSdk\Core\Cast;
use JTDSoft\EssentialsSdk\Core\Collection;
use JTDSoft\EssentialsSdk\Core\Object;

/**
 * Class Lead
 *
 * @property string    $exhibitor_id
 * @property string    $import_id
 * @property string    $badge_type_id
 * @property string    $owner_id
 * @property string    $publish
 * @property bool      $is_managed
 * @property bool      $manages_leads
 * @property int       $managed_leads_count
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
class Lead extends Object
{
    public static function find(string $id, array $expand = []): ?Lead
    {
        return Cast::single(self::class, (new Service())->get("leads/{$id}", compact('expand')));
    }

    public static function get(array $expand = [], array $options = []): Collection
    {
        return Cast::many(self::class, (new Service())->get("leads", compact('expand', 'options')));
    }

    public static function first(array $expand = [], array $options = []): ?Lead
    {
        return self::get($expand, $options)->first();
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

    public function delete()
    {
        return (new Service())->delete("leads/{$this->id}");
    }
}
