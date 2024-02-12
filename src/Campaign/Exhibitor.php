<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasAreas;
use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportCrud;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Collection;

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
 * @property string $biography
 * @property string $source
 * @property string $source_id
 * @property string $website
 * @property string $contact_email
 * @property string $website_email
 * @property array $details
 * @property array $settings
 * @property array $stands
 * @property string $status
 * @property string $is_a_clone
 * @property string $cloned_id
 * @property string $cloned_type
 * @property string $cloned_campaign_id
 * @property-read int smartscan_count
 * @property-read int smartscan_purchased_count
 * @property-read int handiscan_count
 * @property-read int handiscan_purchased_count
 * @property-read string $content_capture_qr_code
 * @property-read string $content_capture_image
 * @property-read string $content_capture_pdf
 * @property-read string $content_capture_zip
 * @property-read string $exhibitor_list_url
 * @property-read string $signed_leads_download_link
 * @property-read string $signed_content_capture_link
 * @property-read string $signed_hot_leads_download_link
 * @property-read string $signed_warm_leads_download_link
 * @property-read string $signed_other_leads_download_link
 * @property-read \Buzz\Control\Campaign\Address[] $addresses
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\Article[] $articles
 * @property-read \Buzz\Control\Campaign\Basket[] $baskets
 * @property-read \Buzz\Control\Campaign\Invite[] $created_invites
 * @property-read \Buzz\Control\Campaign\Vote[] $created_votes
 * @property-read \Buzz\Control\Campaign\Exhibitor $owner
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
 * @property-read \Buzz\Control\Campaign\PageActivity[] $page_activities
 * @property-read \Buzz\Control\Campaign\ExhibitorPressRelease[] $press_releases
 * @property-read \Buzz\Control\Campaign\ModelTag[] $tags
 * @property-read \Buzz\Control\Campaign\Vote[] $votes
 * @property-read \Buzz\Control\Campaign\Question[] $questions
 * @property-read \Buzz\Control\Campaign\Product[] $products
 * @property-read \Buzz\Control\Campaign\Customer $main_contact
 * @property-read \Buzz\Control\Campaign\Customer[] $customers
 * @property-read \Buzz\Control\Campaign\Allowance[] $allowances
 */
class Exhibitor extends SdkObject
{
    use SupportCrud,
        HasAreas,
        Taggable,
        WithAnswerHelpers,
        WithPropertyHelpers,
        HasFiles;

    /**
     * @return \Buzz\EssentialsSdk\Collection
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fetchFilters(): Collection
    {
        return collect($this->api()->get('fetch-exhibitor-filters'));
    }

    public function getEmailInvites(): Collection
    {
        return Cast::many(
            (new Invite()),
            $this->api()->get(
                $this->getEndpoint($this->id . '/email-invites')
            )
        );
    }
}
