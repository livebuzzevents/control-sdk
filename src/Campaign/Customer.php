<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\CanSendEmailMessage;
use Buzz\Control\Campaign\Traits\CanSendSmsMessage;
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
 * Class Customer
 *
 * @property bool $featured
 * @property string $custom_type_id
 * @property bool $badge_preprinted
 * @property bool $badge_printed
 * @property bool $badge_printed_onsite
 * @property bool $badge_viewed
 * @property bool $notifications_enabled
 * @property bool $is_managed
 * @property bool $manages_customers
 * @property bool $meetings_enabled
 * @property bool $app_installed_desktop
 * @property bool $app_installed_mobile
 * @property bool $smart_match_synced
 * @property string $attended
 * @property string $badge_type_id
 * @property string $barcode
 * @property string $biography
 * @property string $cloned_campaign_id
 * @property string $cloned_id
 * @property string $cloned_type
 * @property string $company
 * @property string $custom_status_id
 * @property string $email
 * @property string $exhibitor_id
 * @property string $exhibitor_role
 * @property string $first_name
 * @property string $identifier
 * @property string $import_id
 * @property string $is_a_clone
 * @property string $job_title
 * @property string $language
 * @property string $last_name
 * @property string $middle_name
 * @property string $nationality
 * @property string $owner_id
 * @property string $publish
 * @property string $reg_code
 * @property string $registration_method
 * @property string $registration_social_provider
 * @property string $registration_type
 * @property string $remember_token
 * @property string $sex
 * @property string $source
 * @property string $source_id
 * @property string $status
 * @property string $title
 * @property string $username
 * @property int $profile_score
 * @property-read bool $has_password
 * @property-read bool $printable
 * @property-read int $managed_customers_count
 * @property-read string $avatar
 * @property-read string $barcode_short
 * @property-read string $name
 * @property-read string $qrcode
 * @property-read string $signed_accept_terms_link
 * @property-read string $signed_apple_wallet_pass_link
 * @property-read string $signed_google_pay_pass_link
 * @property-read string $signed_e_badge_link
 * @property-write string $password
 * @property-read OrderProduct[] $assigned_order_products
 * @property-read Address[] $addresses
 * @property-read Allowance[] $allowances
 * @property-read AlternativeId[] $alternative_ids
 * @property-read Answer[] $answers
 * @property-read PageActivity $app_profile_completion
 * @property-read BadgePrint[] $badge_prints
 * @property-read BadgePrint[] $queued_badge_prints
 * @property-read BadgeType $badge_type
 * @property-read BadgeView[] $badge_views
 * @property-read Balance[] $balances
 * @property-read Basket[] $baskets
 * @property-read Charge[] $charges
 * @property-read Customer $owner
 * @property-read Customer[] $created_customers
 * @property-read CustomerAffiliate[] $affiliates
 * @property-read CustomerFlow $flow
 * @property-read CustomerLoginToken[] $login_tokens
 * @property-read CustomerPasswordReset[] $password_resets
 * @property-read CustomerSeminar[] $created_seminars
 * @property-read CustomerSeminar[] $seminars
 * @property-read CustomStatus $custom_status
 * @property-read CustomType $custom_type
 * @property-read EmailMessage[] $email_messages
 * @property-read Exhibitor $exhibitor
 * @property-read Import $import
 * @property-read Invite[] $created_invites
 * @property-read Invite[] $invites
 * @property-read Link[] $links
 * @property-read Log[] $logs
 * @property-read Meeting[] $requested_meetings
 * @property-read Meeting[] $recipient_meetings
 * @property-read Meeting[] $unavailable_meetings
 * @property-read MeetingRequest[] $requested_meetings_request
 * @property-read MeetingRequest[] $recipient_meetings_request
 * @property-read ModelTag[] $tags
 * @property-read Note[] $notes
 * @property-read Order[] $orders
 * @property-read OrderProduct[] $order_products
 * @property-read PageActivity[] $page_activities
 * @property-read Phone[] $phones
 * @property-read Property[] $properties
 * @property-read Redemption[] $redemptions
 * @property-read Scan[] $scans
 * @property-read Scanner[] $scanners
 * @property-read SmsMessage[] $sms_messages
 * @property-read Social[] $socials
 * @property-read SocialToken[] $social_tokens
 * @property-read VisaLetter $visa_letter
 * @property-read CustomType $customType
 */
class Customer extends SdkObject
{
    use CanSendEmailMessage,
        CanSendSmsMessage,
        HasAreas,
        HasFavourites,
        HasFiles,
        SupportCrud,
        Taggable,
        WithAnswerHelpers,
        WithPropertyHelpers;

    public function attachAffiliate($affiliate_id): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id.'/attach-affiliate/'.$affiliate_id)
        );
    }

    public function login(array $credentials): self
    {
        $user_information = [
            'user_agent'      => ! empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null,
            'accept_language' => ! empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : null,
        ];

        if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $user_information['x_ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if (! empty($_SERVER['REMOTE_ADDR'])) {
            $user_information['ip'] = $_SERVER['REMOTE_ADDR'];
        }

        $credentials['user_information'] = $user_information;

        return new self($this->api()->get($this->getEndpoint('login'), $credentials));
    }

    /**
     * @return string
     */
    public function fetchRecommendations(array $parameters): self
    {
        return new self($this->api()->get($this->getEndpoint('fetch-recommendations'), $parameters));
    }

    public function clone($clone_campaign_id, $clone_customer_id): self
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("clone/{$clone_campaign_id}/{$clone_customer_id}")
            )
        );
    }

    public function cloneLead($clone_campaign_id, $clone_lead_id): self
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("clone-lead/{$clone_campaign_id}/{$clone_lead_id}")
            )
        );
    }

    public function sendPasswordResetEmail(): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id.'/send-password-reset-email')
        );
    }

    public function activatePasswordReset(string $token): self
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint('activate-password-reset/'.$token)
            )
        );
    }

    public function dupeCheck(): bool
    {
        try {
            $this->api()->post(
                $this->getEndpoint('dupe-check'),
                $this->prepareRequestData()
            );
        } catch (ErrorException $e) {
            return explode(', ', str_replace('Duped on: ', '', $e->getError()));
        }

        return false;
    }

    /**
     * Suggests connections
     */
    public function suggestConnections(): ?array
    {
        return $this->api()->get(
            $this->getEndpoint($this->id.'/suggest-connections')
        );
    }

    /**
     * Suggests exhibitors
     */
    public function suggestExhibitors(int $count = 15): Collection
    {
        return Cast::many(
            (new Exhibitor),
            $this->api()->get(
                $this->getEndpoint($this->id.'/suggest-exhibitors/'.$count)
            )
        );
    }

    /**
     * Suggests connections
     */
    public function setBadgeViewed()
    {
        $this->api()->post(
            $this->getEndpoint($this->id.'/set-badge-viewed')
        );
    }

    /**
     * @param  int  $width
     * @param  int  $height
     */
    public function getBarcodeImage($width = 1, $height = 30): string
    {
        return $this->api()->get(
            $this->getEndpoint($this->id.'/barcode-image'),
            compact('width', 'height')
        )['image'];
    }

    /**
     * @param  int  $size
     */
    public function getQrCodeImage($size = 125): string
    {
        return $this->api()->get(
            $this->getEndpoint($this->id.'/qrcode-image'),
            compact('size')
        )['image'];
    }

    public function getEBadge(): string
    {
        return $this->api()->get(
            $this->getEndpoint($this->id.'/e-badge')
        )['e-badge'];
    }

    public function generateOAuthToken(string $audience, ?int $lifetime_seconds = null): string
    {
        return $this->api()->post(
            $this->getEndpoint($this->id.'/generate-oauth-token/'.$audience),
            compact('lifetime_seconds')
        )['token'];
    }

    public function printBadge(string $printer_id, ?string $badge_stock_id = null): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id.'/print-badge/'.$printer_id),
            $badge_stock_id ? ['badge_stock_id' => $badge_stock_id] : null
        );
    }

    public function attachInvite(string $invite_id): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id.'/attach-invite/'.$invite_id)
        );
    }

    public function getBasket(): ?Basket
    {
        return Cast::single(
            (new Basket),
            $this->api()->get(
                $this->getEndpoint($this->id.'/basket')
            )
        );
    }

    public function getEmailInvites(): Collection
    {
        return Cast::many(
            (new Invite),
            $this->api()->get(
                $this->getEndpoint($this->id.'/email-invites')
            )
        );
    }

    public function getSeminars(?Seminar $seminar = null): Collection
    {
        $endpoint = $seminar ? "/seminars/$seminar->id" : '/seminars';

        return Cast::many(
            (new Seminar),
            $this->api()->get(
                $this->getEndpoint($this->id.$endpoint)
            )
        );
    }

    public function getNotes(?string $model_type = null, ?string $model_id = null): Collection
    {
        if ($model_type && $model_id) {
            $request = [
                'model_type' => $model_type,
                'model_id'   => $model_id,
            ];
        }

        return Cast::many(
            (new Note),
            $this->api()->get(
                $this->getEndpoint($this->id.'/notes'),
                $request ?? null
            )
        );
    }

    public function getFavourites(): array
    {
        return $this->api()->get($this->getEndpoint($this->id.'/favourites'));
    }

    public function getOrders(): Collection
    {
        return Cast::many(
            (new Customer),
            $this->api()->get(
                $this->getEndpoint($this->id.'/orders')
            )
        );
    }

    public function getStripeOrders(): array
    {
        return $this->api()->get($this->getEndpoint($this->id.'/stripe-orders'));
    }

    public function getColleagues(): Collection
    {
        return Cast::many(
            (new Customer),
            $this->api()->post(
                $this->getEndpoint($this->id.'/colleagues'),
                ['type_ids' => json_decode(request('type_ids'), true)]
            )
        );
    }

    public function getBadgeDownloads(): array
    {
        return $this->api()->post($this->getEndpoint($this->id.'/badge-downloads'));
    }

    public function downloadBadges(Customer $customer, ?string $badgeTypeId = null): string
    {
        if ($badgeTypeId) {
            return $this->api()->get(
                $this->getEndpoint(sprintf('%s/download-badges/%s', $this->id, $badgeTypeId))
            );
        }

        return $this->api()->get($this->getEndpoint(sprintf('%s/download-badges', $this->id)));
    }

    public function removeFlow(): void
    {
        $this->api()->get($this->getEndpoint($this->id.'/remove-flow'));
    }

    public function startFlow(int $step = 1): void
    {
        $this->api()->get($this->getEndpoint($this->id.'/start-flow/'.$step));
    }

    public function completeFlow(): void
    {
        $this->api()->get($this->getEndpoint($this->id.'/complete-flow'));
    }

    /**
     * @param  int  $stepB
     */
    public function setFlowStep(int $step): void
    {
        $this->api()->get($this->getEndpoint($this->id.'/set-flow-step/'.$step));
    }

    public function getSignedUrl(string $stream_id): string
    {
        return $this->api()->get($this->getEndpoint($this->id.'/signed-url/'.$stream_id))['url'];
    }

    public function getOutgoingSsoOptions(string $integration_provider_id): ?array
    {
        return $this->api()->get($this->getEndpoint($this->id.'/outgoing-sso-options/'.$integration_provider_id));
    }

    /**
     * @throws ErrorException
     */
    public function fetchAttendeesForApp(string $entityListId): array
    {
        return $this->api()->get("app/fetch/$entityListId/attendees", [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    public function fetchAttendeeFilters(string $entityListId): Collection
    {
        return collect($this->api()->get("app/fetch/$entityListId/attendee-filters"));
    }

    /**
     * @throws ErrorException
     */
    public function fetchSpeakersForApp(string $entityListId): array
    {
        return $this->api()->get("app/fetch/$entityListId/speakers", [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    public function fetchSpeakerFilters(string $entityListId): Collection
    {
        return collect($this->api()->get("app/fetch/$entityListId/speaker-filters"));
    }

    public function meetingAgenda(): array
    {
        return $this->api()->get($this->getEndpoint($this->id.'/meeting-agenda'));
    }

    public function previewInvite(string $email_message_template_id, array $input): string
    {
        return $this->api()->post(
            $this->getEndpoint(customer()->id."/preview-invite/{$email_message_template_id}"),
            $input
        )['html'];
    }

    public function transferAssignedOrderProduct(string $product_id): Customer
    {
        return Cast::single(
            (new Customer),
            $this->api()->get(
                $this->getEndpoint($this->id.'/transfer-assigned-order-product/'.$product_id)
            )
        );
    }

    public function getAllocations()
    {
        return $this->api()->post(
            $this->getEndpoint(
                $this->id.'/get-allocations'
            ),
            ['product_ids' => json_decode(request('product_ids'), true)]
        );
    }

    public function hasNewMessages(): bool
    {
        return $this->api()->post(
            $this->getEndpoint(customer()->id.'/has-new-messages'),
            [
                'last_sync' => request('last_sync'),
            ]
        );
    }

    public function hasMeetingUpdates(): bool
    {
        return $this->api()->post(
            $this->getEndpoint(customer()->id.'/has-meeting-updates'),
            [
                'last_sync' => request('last_sync'),
            ]
        );
    }

    public function switchableExhibitorHubs(): Collection
    {
        return Cast::many(
            (new Customer),
            $this->api()->get($this->getEndpoint($this->id.'/switchable-exhibitor-hubs'))['data'],
        );
    }
}
