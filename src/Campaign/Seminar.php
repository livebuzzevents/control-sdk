<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasAreas;
use Buzz\Control\Campaign\Traits\HasFavourites;
use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Exceptions\ErrorException;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class Seminar
 *
 * @property bool $featured
 * @property string $custom_type_id
 * @property string $identifier
 * @property string $title
 * @property string $description
 * @property string $theater_id
 * @property int $capacity
 * @property string $colour
 * @property string $location
 * @property string $publish
 * @property array $settings
 * @property string $source
 * @property string $source_id
 * @property Carbon $ends_at
 * @property Carbon $starts_at
 * @property CustomerSeminar[] $speakers
 * @property-read string $content_capture_qr_code
 * @property-read int $spaces_taken
 * @property-read int $spaces_available
 * @property-read string $signed_attendees_download_link
 * @property-read CustomType $custom_type
 * @property-read Link[] $links
 * @property-read Theater $theater
 * @property-read Exhibitor $exhibitor
 * @property-read Product $product
 * @property-read CustomerSeminar[] $customer_seminars
 * @property-read CustomerSeminar[] $attendees
 * @property-read Scanner[] $scanners
 * @property-read SeminarTopic[] $topics
 * @property-read Exhibitor[] $exhibitors
 */
class Seminar extends SdkObject
{
    use HasAreas,
        HasFavourites,
        HasFiles,
        SupportRead,
        SupportWrite,
        Translatable;

    public function attachTopic(string $topic_id): void
    {
        $this->api()->post($this->getEndpoint("{$this->id}/attach-topic/{$topic_id}"));
    }

    public function detachTopic(string $topic_id): void
    {
        $this->api()->delete($this->getEndpoint("{$this->id}/detach-topic/{$topic_id}"));
    }

    public function syncTopics(array $topic_ids): void
    {
        $this->api()->post($this->getEndpoint("{$this->id}/sync-topics"), $topic_ids);
    }

    public function getAdditionalInfo(): array
    {
        return $this->api()->get(
            $this->getEndpoint($this->id.'/fetch/additional-info')
        );
    }

    /**
     * @throws ErrorException
     */
    public function fetchForApp(string $entityListId): array
    {
        return $this->api()->get("app/fetch/$entityListId/seminars", [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    public function fetchFilters(string $entityListId): Collection
    {
        return collect($this->api()->get("app/fetch/$entityListId/seminar-filters"));
    }
}
