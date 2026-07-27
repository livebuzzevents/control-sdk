<?php

namespace Buzz\Control;

/**
 * Class SdkObject
 *
 * @property string $id
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 */
class SdkObject extends \Buzz\EssentialsSdk\SdkObject
{
    protected $section;

    /**
     * @var string
     */
    protected $endpoint_prefix = '';

    /**
     * Override default service
     */
    protected function service(): Service
    {
        return new Service;
    }

    protected function api()
    {
        $api = parent::api();

        $api->setSection($this->section);

        return $api;
    }

    protected function getEndpoint(?string $path = null): string
    {
        $resource = kebab_case(str_plural(class_basename(static::class)));

        if ($this->endpoint_prefix) {
            $endpoint = $this->endpoint_prefix.'/'.$resource;
        } else {
            $endpoint = $resource;
        }

        if ($path) {
            $endpoint .= '/'.ltrim($path, '/');
        }

        return ltrim($endpoint, '/');
    }
}
