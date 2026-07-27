<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\HasFiles;
use Buzz\Control\Campaign\Traits\Translatable;
use Buzz\Control\Traits\SupportRead;

/**
 * Class Floorplan
 *
 * @property string $identifier
 * @property string $name
 * @property string $highlight_colour
 * @property string $publish
 * @property int $order
 * @property array $settings
 */
class Floorplan extends SdkObject
{
    use HasFiles,
        SupportRead,
        Translatable;

    public function exhibitors(): array
    {
        return $this->api()->get(sprintf('app/fetch/%s/floorplan/exhibitors', customer()->id), [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }

    public function seminars(): array
    {
        return $this->api()->get(sprintf('app/fetch/%s/floorplan/seminars', customer()->id), [
            'page'     => request('page'),
            'per_page' => request('per_page'),
        ]);
    }
}
