<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Collection;

/**
 * Class Page
 *
 * @property string $identifier
 * @property string $friendly_url
 * @property string $active
 * @property string $description
 * @property string $footer
 * @property string $stream_id
 * @property string $parent_id
 * @property string $title
 * @property string $icon
 * @property string $color
 * @property string $type
 * @property string $value
 * @property int $order
 * @property array $settings
 * @property array $actions
 * @property bool $global_page
 * @property bool $global_components
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
     * @param Stream $stream
     * @param SdkObject[] $targets
     *
     * @return Collection
     * @throws Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function load(?Stream $stream, array $targets, $filter = null): Collection
    {
        $request = [
            'targets' => [],
        ];

        if ($stream) {
            $request['stream_id'] = $stream->id;
        }

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
     * @param \Buzz\Control\Campaign\SdkObject[] $targets
     *
     * @return \Buzz\EssentialsSdk\Collection
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function loadComponents(array $targets, array $extraData = []): Collection
    {
        $request = [
            'targets' => [],
        ];

        $request = array_merge($request, $extraData);

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

        if (request('affiliate') || session('affiliate') || session('affiliate-name')) {
            $request['affiliate'] = request('affiliate') ?? session('affiliate') ?? session('affiliate-name');
        }

        if (request('invite') || session('invite')) {
            $request['visitor_invite'] = true;
        }

        if (request('exhibitor-inviter') || session('exhibitor-inviter')) {
            $request['exhibitor_invite'] = true;
        }

        if (request()->is('*/clone*') || session('prepop')) {
            $request['prepop'] = true;
        }

        if ($badgeTypeId = request()->route()?->parameter('badge_type_id')) {
            $request['badge_type_id'] = $badgeTypeId;
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
     * @param \Buzz\Control\Campaign\SdkObject[] $targets
     */
    public function saveComponents(array $input, array $targets, array $extraData = [])
    {
        $request = [
            'targets'    => [],
            'components' => array_merge($input, $extraData),
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

        $request['components']['initiator']    = true;
        $request['components']['initiator_id'] = customer()->id ?? null;
        $request['components']['initiator_exhibitor_id'] = exhibitor()->id ?? null;

        if (request('affiliate') || session('affiliate') || session('affiliate-name')) {
            $request['components']['affiliate'] = request('affiliate') ?? session('affiliate') ?? session('affiliate-name');
        }

        if (request('invite') || session('invite')) {
            $request['components']['visitor_invite'] = true;
        }

        if (request('exhibitor-inviter') || session('exhibitor-inviter')) {
            $request['components']['exhibitor_invite'] = true;
        }

        if (request()->is('*/clone*') || session('prepop')) {
            $request['components']['prepop'] = true;
        }

        if ($badgeTypeId = request()->route()?->parameter('badge_type_id')) {
            $request['components']['badge_type_id'] = $badgeTypeId;
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
