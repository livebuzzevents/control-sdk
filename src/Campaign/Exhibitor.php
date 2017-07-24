<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Traits\SupportCrud;

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
    use SupportCrud,
        Taggable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getEmailInvites(): Collection
    {
        return Cast::many(Invite::class, $this->api()->get(
            $this->getEndpoint($this->id . '/email-invites')
        ));
    }
}
