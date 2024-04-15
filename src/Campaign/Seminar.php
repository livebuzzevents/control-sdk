<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasAreas;
use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Exceptions\ErrorException;
use Illuminate\Support\Collection;

/**
 * Class Seminar
 *
 * @property string $identifier
 * @property string $title
 * @property string $description
 * @property string $exhibitor_id
 * @property string $theater_id
 * @property int $capacity
 * @property string $colour
 * @property string $location
 * @property string $publish
 * @property array $settings
 * @property string $source
 * @property string $source_id
 * @property \DateTime $ends_at
 * @property \DateTime $starts_at
 * @property-read string $content_capture_qr_code
 * @property-read int $spaces_taken
 * @property-read int $spaces_available
 * @property-read string $signed_attendees_download_link
 * @property-read \Buzz\Control\Campaign\Link[] $links
 * @property-read \Buzz\Control\Campaign\Theater $theater
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\Product $product
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $customer_seminars
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $attendees
 * @property-read \Buzz\Control\Campaign\CustomerSeminar[] $speakers
 * @property-read \Buzz\Control\Campaign\Scanner[] $scanners
 * @property-read \Buzz\Control\Campaign\SeminarTopic[] $topics
 */
class Seminar extends SdkObject
{
    use SupportRead,
        SupportWrite,
        Translatable,
        HasAreas,
        HasFiles;

    /**
     * @param string $topic_id
     */
    public function attachTopic(string $topic_id): void
    {
        $this->api()->post($this->getEndpoint("{$this->id}/attach-topic/{$topic_id}"));
    }

    /**
     * @param string $topic_id
     */
    public function detachTopic(string $topic_id): void
    {
        $this->api()->delete($this->getEndpoint("{$this->id}/detach-topic/{$topic_id}"));
    }

    /**
     * @param array $topic_ids
     */
    public function syncTopics(array $topic_ids): void
    {
        $this->api()->post($this->getEndpoint("{$this->id}/sync-topics"), $topic_ids);
    }

    /**
     * @return array
     */
    public function getCapacities(): array
    {
        return $this->api()->get(
            $this->getEndpoint($this->id . '/fetch/capacities')
        );
    }

    /**
     * @return array
     * @throws ErrorException
     */
    public function fetchForPwa(): array
    {
        return $this->api()->get('pwa/fetch-seminars', [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fetchFilters(): Collection
    {
        return collect($this->api()->get('pwa/fetch-seminar-filters'));
    }
}
