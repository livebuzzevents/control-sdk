<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasAreas;
use Buzz\Control\Campaign\Traits\HasFavourites;
use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportCrud;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Exceptions\ErrorException;
use Illuminate\Support\Collection;

/**
 * Class Exhibitor
 *
 * @property string $show_email
 * @property string $show_addresses
 * @property string $show_phones
 * @property bool $featured
 * @property string $custom_type_id
 * @property string $import_id
 * @property string $owner_id
 * @property string $publish
 * @property string $image
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
 * @property-read Address[] $addresses
 * @property-read Answer[] $answers
 * @property-read Article[] $articles
 * @property-read Basket[] $baskets
 * @property-read Invite[] $created_invites
 * @property-read Exhibitor $owner
 * @property-read Import $import
 * @property-read Invite[] $invites
 * @property-read Link[] $links
 * @property-read Log[] $logs
 * @property-read Note[] $notes
 * @property-read Order[] $orders
 * @property-read Phone[] $phones
 * @property-read Property[] $properties
 * @property-read Scanner[] $scanners
 * @property-read Scan[] $scans
 * @property-read CustomType $custom_type
 * @property-read SeminarExhibitor[] $seminars
 * @property-read PageActivity[] $page_activities
 * @property-read ExhibitorPressRelease[] $press_releases
 * @property-read ModelTag[] $tags
 * @property-read Question[] $questions
 * @property-read Product[] $products
 * @property-read Customer $main_contact
 * @property-read Customer[] $customers
 * @property-read Allowance[] $allowances
 * @property-read string $signed_all_favourites_download_link
 */
class Exhibitor extends SdkObject
{
    use HasAreas,
        HasFavourites,
        HasFiles,
        SupportCrud,
        Taggable,
        WithAnswerHelpers,
        WithPropertyHelpers;

    /**
     * @return \Buzz\EssentialsSdk\Collection
     *
     * @throws ErrorException
     */
    public function getFlattenedAllowances(string $entitlement, ?string $type = null): Collection
    {
        return collect(
            $this->api()->post(
                $this->getEndpoint($this->id.'/flattened-allowances'),
                [
                    'entitlement' => $entitlement,
                    'type'        => $type,
                ]
            )
        );
    }

    /**
     * @return \Buzz\EssentialsSdk\Collection
     *
     * @throws ErrorException
     */
    public function getEmailInvites(): Collection
    {
        return Cast::many(
            (new Invite),
            $this->api()->get(
                $this->getEndpoint($this->id.'/email-invites')
            )
        );
    }

    public function downloadBadges(Customer $customer, ?string $badgeTypeId = null): string
    {
        if ($badgeTypeId) {
            return $this->api()->get(
                $this->getEndpoint(
                    sprintf(
                        '%s/download-badges/%s/%s',
                        $this->id,
                        $customer->id,
                        $badgeTypeId
                    )
                )
            );
        }

        return $this->api()->get($this->getEndpoint($this->id.'/download-badges/'.$customer->id));
    }

    /**
     * @throws ErrorException
     */
    public function fetchForApp(string $entityListId): array
    {
        return $this->api()->get("app/fetch/$entityListId/exhibitors", [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    /**
     * @throws ErrorException
     */
    public function fetchBadgeHolders(string $exhibitor): array
    {
        return $this->api()->get("app/fetch/$exhibitor/exhibitor-badge-holders", [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    /**
     * @throws ErrorException
     */
    public function fetchProducts(string $exhibitor): array
    {
        return $this->api()->get("app/fetch/$exhibitor/exhibitor-products", [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    public function fetchFilters(string $entityListId): Collection
    {
        return collect($this->api()->get("app/fetch/$entityListId/exhibitor-filters"));
    }

    public function smartscanPlus(): array
    {
        return $this->api()->get($this->getEndpoint($this->id.'/smartscan-plus'));
    }

    public function downloadLeads(?Scanner $scanner = null): string
    {
        $endpoint = '/download-leads';

        if (optional($scanner)->id) {
            $endpoint .= '/'.$scanner->id;
        }

        return $this->api()->post(
            $this->getEndpoint($this->id.$endpoint), request()->only('scan_filters')
        );
    }
}
