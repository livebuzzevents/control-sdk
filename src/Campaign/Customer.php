<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\CanSendEmailMessage;
use Buzz\Control\Campaign\Traits\CanSendSmsMessage;
use Buzz\Control\Campaign\Traits\HasAreas;
use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Taggable;
use Buzz\Control\Campaign\Traits\WithAnswerHelpers;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportCrud;
use Illuminate\Support\Collection;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Customer
 *
 * @property bool $badge_preprinted
 * @property bool $badge_printed
 * @property bool $badge_printed_onsite
 * @property bool $badge_viewed
 * @property bool $notifications_enabled
 * @property bool $is_managed
 * @property bool $manages_customers
 * @property bool $meetings_enabled
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
 * @property integer $profile_score
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
 * @property-read \Buzz\Control\Campaign\OrderProduct[] $assigned_order_products
 * @property-read \Buzz\Control\Campaign\Address[] $addresses
 * @property-read \Buzz\Control\Campaign\Allowance[] $allowances
 * @property-read \Buzz\Control\Campaign\AlternativeId[] $alternative_ids
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 * @property-read \Buzz\Control\Campaign\BadgePrint[] $badge_prints
 * @property-read \Buzz\Control\Campaign\BadgePrint[] $queued_badge_prints
 * @property-read \Buzz\Control\Campaign\BadgeType $badge_type
 * @property-read \Buzz\Control\Campaign\BadgeView[] $badge_views
 * @property-read \Buzz\Control\Campaign\Balance[] $balances
 * @property-read \Buzz\Control\Campaign\Basket[] $baskets
 * @property-read \Buzz\Control\Campaign\Charge[] $charges
 * @property-read \Buzz\Control\Campaign\Customer $owner
 * @property-read \Buzz\Control\Campaign\Customer[] $created_customers
 * @property-read \Buzz\Control\Campaign\CustomerAffiliate[] $affiliates
 * @property-read \Buzz\Control\Campaign\CustomerFlow $flow
 * @property-read \Buzz\Control\Campaign\CustomerLoginToken[] $login_tokens
 * @property-read \Buzz\Control\Campaign\CustomerPasswordReset[] $password_resets
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $created_seminars
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $seminars
 * @property-read \Buzz\Control\Campaign\CustomStatus $custom_status
 * @property-read \Buzz\Control\Campaign\EmailMessage[] $email_messages
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\Import $import
 * @property-read \Buzz\Control\Campaign\Invite[] $created_invites
 * @property-read \Buzz\Control\Campaign\Invite[] $invites
 * @property-read \Buzz\Control\Campaign\Link[] $links
 * @property-read \Buzz\Control\Campaign\Log[] $logs
 * @property-read \Buzz\Control\Campaign\Meeting[] $guested_meetings
 * @property-read \Buzz\Control\Campaign\Meeting[] $hosted_meetings
 * @property-read \Buzz\Control\Campaign\Meeting[] $unavailable_meetings
 * @property-read \Buzz\Control\Campaign\MeetingRequest[] $guested_meetings_request
 * @property-read \Buzz\Control\Campaign\MeetingRequest[] $hosted_meetings_request
 * @property-read \Buzz\Control\Campaign\ModelTag[] $tags
 * @property-read \Buzz\Control\Campaign\Note[] $notes
 * @property-read \Buzz\Control\Campaign\Order[] $orders
 * @property-read \Buzz\Control\Campaign\OrderProduct[] $order_products
 * @property-read \Buzz\Control\Campaign\PageActivity[] $page_activities
 * @property-read \Buzz\Control\Campaign\Phone[] $phones
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\Redemption[] $redemptions
 * @property-read \Buzz\Control\Campaign\Scan[] $scans
 * @property-read \Buzz\Control\Campaign\Scanner[] $scanners
 * @property-read \Buzz\Control\Campaign\SmsMessage[] $sms_messages
 * @property-read \Buzz\Control\Campaign\Social[] $socials
 * @property-read \Buzz\Control\Campaign\SocialToken[] $social_tokens
 * @property-read \Buzz\Control\Campaign\Vote[] $created_votes
 * @property-read \Buzz\Control\Campaign\Vote[] $votes
 */
class Customer extends SdkObject
{
    use SupportCrud,
        CanSendEmailMessage,
        CanSendSmsMessage,
        HasAreas,
        Taggable,
        WithAnswerHelpers,
        WithPropertyHelpers,
        HasFiles;

    /**
     * @param $affiliate_id
     */
    public function attachAffiliate($affiliate_id): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id . '/attach-affiliate/' . $affiliate_id)
        );
    }

    /**
     * @param array $credentials
     *
     * @return \Buzz\Control\Campaign\Customer
     */
    public function login(array $credentials): self
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

    /**
     * @param array $parameters
     *
     * @return string
     */
    public function fetchRecommendations(array $parameters): self
    {
        return new self($this->api()->get($this->getEndpoint('fetch-recommendations'), $parameters));
    }

    /**
     * @param $clone_campaign_id
     * @param $clone_customer_id
     *
     * @return \Buzz\Control\Campaign\Customer
     */
    public function clone($clone_campaign_id, $clone_customer_id): self
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("clone/{$clone_campaign_id}/{$clone_customer_id}")
            )
        );
    }

    /**
     * @param $clone_campaign_id
     * @param $clone_lead_id
     *
     * @return \Buzz\Control\Campaign\Customer
     */
    public function cloneLead($clone_campaign_id, $clone_lead_id): self
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint("clone-lead/{$clone_campaign_id}/{$clone_lead_id}")
            )
        );
    }

    /**
     *
     */
    public function sendPasswordResetEmail(): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id . '/send-password-reset-email')
        );
    }

    /**
     * @param string $token
     *
     * @return \Buzz\Control\Campaign\Customer
     */
    public function activatePasswordReset(string $token): self
    {
        return new self(
            $this->api()->post(
                $this->getEndpoint('activate-password-reset/' . $token)
            )
        );
    }

    /**
     * @return bool
     */
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
            $this->getEndpoint($this->id . '/suggest-connections')
        );
    }

    /**
     * Suggests exhibitors
     *
     * @param int $count
     *
     * @return \Illuminate\Support\Collection
     */
    public function suggestExhibitors(int $count = 15): Collection
    {
        return Cast::many(
            (new Exhibitor()),
            $this->api()->get(
                $this->getEndpoint($this->id . '/suggest-exhibitors/' . $count)
            )
        );
    }

    /**
     * Suggests connections
     */
    public function setBadgeViewed()
    {
        $this->api()->post(
            $this->getEndpoint($this->id . '/set-badge-viewed')
        );
    }

    /**
     * @param int $width
     * @param int $height
     *
     * @return string
     */
    public function getBarcodeImage($width = 1, $height = 30): string
    {
        return $this->api()->get(
            $this->getEndpoint($this->id . '/barcode-image'),
            compact('width', 'height')
        )['image'];
    }

    /**
     * @param int $size
     *
     * @return string
     */
    public function getQrCodeImage($size = 125): string
    {
        return $this->api()->get(
            $this->getEndpoint($this->id . '/qrcode-image'),
            compact('size')
        )['image'];
    }

    /**
     * @return string
     */
    public function getEBadge(): string
    {
        return $this->api()->get(
            $this->getEndpoint($this->id . '/e-badge')
        )['e-badge'];
    }

    /**
     * @param string $audience
     * @param int $lifetime_seconds
     *
     * @return string
     */
    public function generateOAuthToken(string $audience, int $lifetime_seconds = null): string
    {
        return $this->api()->post(
            $this->getEndpoint($this->id . '/generate-oauth-token/' . $audience),
            compact('lifetime_seconds')
        )['token'];
    }

    /**
     * @param string $printer_id
     * @param string|null $badge_stock_id
     */
    public function printBadge(string $printer_id, string $badge_stock_id = null): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id . '/print-badge/' . $printer_id),
            $badge_stock_id ? ['badge_stock_id' => $badge_stock_id] : null
        );
    }

    /**
     * @param string $invite_id
     */
    public function attachInvite(string $invite_id): void
    {
        $this->api()->post(
            $this->getEndpoint($this->id . '/attach-invite/' . $invite_id)
        );
    }

    /**
     * @return ?Basket
     */
    public function getBasket(): ?Basket
    {
        return Cast::single(
            (new Basket()),
            $this->api()->get(
                $this->getEndpoint($this->id . '/basket')
            )
        );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getEmailInvites(): Collection
    {
        return Cast::many(
            (new Invite()),
            $this->api()->get(
                $this->getEndpoint($this->id . '/email-invites')
            )
        );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getSeminars(): Collection
    {
        return Cast::many(
            (new Seminar()),
            $this->api()->get(
                $this->getEndpoint($this->id . '/seminars')
            )
        );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getOrders(): Collection
    {
        return Cast::many(
            (new Customer()),
            $this->api()->get(
                $this->getEndpoint($this->id . '/orders')
            )
        );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getColleagues(): Collection
    {
        return Cast::many(
            (new Customer()),
            $this->api()->get(
                $this->getEndpoint($this->id . '/colleagues')
            )
        );
    }

    /**
     * @param int $step
     */
    public function startFlow(int $step = 1): void
    {
        $this->api()->get($this->getEndpoint($this->id . '/start-flow/' . $step));
    }

    /**
     *
     */
    public function completeFlow(): void
    {
        $this->api()->get($this->getEndpoint($this->id . '/complete-flow'));
    }

    /**
     * @param int $stepB
     */
    public function setFlowStep(int $step): void
    {
        $this->api()->get($this->getEndpoint($this->id . '/set-flow-step/' . $step));
    }

    /**
     * @param string $stream_id
     *
     * @return string
     */
    public function getSignedUrl(string $stream_id): string
    {
        return $this->api()->get($this->getEndpoint($this->id . '/signed-url/' . $stream_id))['url'];
    }

    /**
     * @param string $integration_provider_id
     *
     * @return array|null
     */
    public function getOutgoingSsoOptions(string $integration_provider_id): ?array
    {
        return $this->api()->get($this->getEndpoint($this->id . '/outgoing-sso-options/' . $integration_provider_id));
    }

    /**
     * @return array
     * @throws ErrorException
     */
    public function fetchAttendeesForApp(string $exhibitor_id = null): array
    {
        return $this->api()->get('app/fetch-attendees', [
            'exhibitor_id' => $exhibitor_id,
            'page'         => request('page'),
            'per_page'     => request('per_page'),
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fetchAttendeeFilters(): Collection
    {
        return collect($this->api()->get('app/fetch-attendee-filters'));
    }

    /**
     * @return array
     * @throws ErrorException
     */
    public function fetchSpeakersForApp(): array
    {
        return $this->api()->get('app/fetch-speakers', [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fetchSpeakerFilters(): Collection
    {
        return collect($this->api()->get('app/fetch-speaker-filters'));
    }

    /**
     * @return array
     */
    public function meetingAgenda(): array
    {
        return $this->api()->get($this->getEndpoint($this->id . '/meeting-agenda'));
    }
}
