<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\EssentialsSdk\Cast;
use Illuminate\Support\Str;

/**
 * Class Import
 *
 * @property string $name
 * @property string $user_id
 * @property string $exhibitor_id
 * @property string $type
 * @property array $settings
 * @property boolean $configured
 * @property-read int $imported
 * @property-read \Buzz\Control\Gateway\User $user
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 */
class Import extends SdkObject
{
    use SupportRead;

    public function exhibitor(Exhibitor $exhibitor)
    {
        $import = Cast::single(
            (new Import()),
            $this->api()->post($this->getEndpoint(sprintf('exhibitor/%s', $exhibitor->id)), request()->all())
        );

        (new File())->add(
            $import,
            "$import->name.xlsx",
            request()->file('file')->get(),
            Str::slug($import->name),
            'private'
        );

        return $import;
    }
}
