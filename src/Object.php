<?php

namespace Buzz\Control;

/**
 * Class Object
 *
 * @property string $id
 * @property \DateTime $updated_at
 * @property \DateTime $created_at
 */
class Object extends \JTDSoft\EssentialsSdk\Object
{
    /**
     * @var
     */
    protected $section;

    /**
     * @var
     */
    protected static $resource;

    /**
     * @var string
     */
    protected $endpoint_prefix = '';

    /**
     * Override default service
     *
     * @return \Buzz\Control\Service
     */
    protected function service(): Service
    {
        return new Service();
    }

    /**
     *
     */
    protected function api()
    {
        $api = parent::api();

        $api->setSection($this->section);

        return $api;
    }

    /**
     * @param string|null $path
     *
     * @return string
     */
    protected function getEndpoint(string $path = null): string
    {
        $resource = static::$resource ?? kebab_case(str_plural(class_basename(static::class)));

        if ($this->endpoint_prefix) {
            $endpoint = $this->endpoint_prefix . '/' . $resource;
        } else {
            $endpoint = $resource;
        }

        if ($path) {
            $endpoint .= '/' . ltrim($path, '/');
        }

        return ltrim($endpoint, '/');
    }
}
