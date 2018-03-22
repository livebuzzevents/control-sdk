<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Campaign\Traits\WithPropertyHelpers;
use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;
use JTDSoft\EssentialsSdk\Cast;
use JTDSoft\EssentialsSdk\Collection;

/**
 * Class Page
 *
 * @property string $identifier
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
     * @param \Buzz\Control\Campaign\SdkObject[] ...$targets
     *
     * @return \JTDSoft\EssentialsSdk\Collection
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function loadComponents(...$targets): Collection
    {
        $request = [
            'targets' => [],
        ];

        foreach ($targets as $target) {
            $request['targets'][] = [
                'model_type' => class_basename($target),
                'model_id'   => $target->id,
            ];
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

        foreach ($targets as $target) {
            $request['targets'][] = [
                'model_type' => class_basename($target),
                'model_id'   => $target->id,
            ];
        }

        $this->api()->post(
            $this->getEndpoint($this->id . '/save-components'),
            $request
        );
    }
}
