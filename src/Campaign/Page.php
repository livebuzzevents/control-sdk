<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Collection;
use Buzz\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class Page
 *
 * @property string $identifier
 * @property string $friendly_url
 * @property string $active
 * @property string $description
 * @property string $stream_id
 * @property string $parent_id
 * @property string $title
 * @property string $icon
 * @property string $color
 * @property string $type
 * @property string $value
 * @property int $order
 * @property array $settings
 * @property-read \Buzz\Control\Campaign\Stream $stream
 * @property-read \Buzz\Control\Campaign\Page $parent
 * @property-read \Buzz\Control\Campaign\Property[] $properties
 * @property-read \Buzz\Control\Campaign\Component[] $components
 */
class Page extends SdkObject
{
    use SupportRead,
        SupportWrite,
        Translatable,
        HasFiles,
        WithPropertyHelpers;

    /**
     * @var bool
     */
    protected $dupeCheckEnabled = true;

    /**
     * @param bool $dupeCheckEnabled
     */
    public function setDupeCheck(bool $dupeCheckEnabled)
    {
        $this->dupeCheckEnabled = $dupeCheckEnabled;
    }

    /**
     * @param Stream|null $stream
     * @param SdkObject[] ...$targets
     * @param null $filter
     *
     * @return Collection
     * @throws ErrorException
     */
    public function load(Stream $stream, array $targets, $filter = null): Collection
    {
        $request = [
            'stream_id' => $stream->id,
            'targets'   => [],
        ];
        
        if ($filter) {
            $request['filter'] = $filter;
        }

        foreach ($targets as $target) {
            if ($target) {
                $request['targets'][] = [
                    'model_type' => class_basename($target),
                    'model_id'   => $target->id,
                ];
            }
        }

        if (exhibitor()) {
            $request['initiator_role'] = customer()->exhibitor_role;
        }

        return Cast::many(
            (new Page()),
            $this->api()->post('pages-for-hub', $request)
        );
    }

    /**
     * @param \Buzz\Control\Campaign\SdkObject[] ...$targets
     *
     * @return \Buzz\EssentialsSdk\Collection
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function loadComponents(...$targets): Collection
    {
        $request = [
            'targets' => [],
        ];

        foreach ($targets as $target) {
            if ($target) {
                $request['targets'][] = [
                    'model_type' => class_basename($target),
                    'model_id'   => $target->id,
                ];
            }
        }

        return Cast::many(
            (new Component()),
            $this->api()->post(
                $this->getEndpoint($this->id . '/load-components'),
                $request
            )
        );
    }

    /**
     * @param array $input
     * @param \Buzz\Control\Campaign\SdkObject[] ...$targets
     */
    public function saveComponents(array $input, ...$targets)
    {
        $request = [
            'targets'    => [],
            'components' => $input,
        ];

        if (!$this->dupeCheckEnabled) {
            $request['disable_dupecheck'] = true;
        }

        foreach ($targets as $target) {
            if ($target) {
                $request['targets'][] = [
                    'model_type' => class_basename($target),
                    'model_id'   => $target->id,
                ];
            }
        }

        $saveComponents = $this->api()->post(
            $this->getEndpoint($this->id . '/save-components'),
            $request
        );

        return Cast::single(
            app('\\Buzz\\Control\\Campaign\\' . key($saveComponents)),
            $saveComponents[key($saveComponents)]
        );
    }
}
