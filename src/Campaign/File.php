<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Object as BaseObject;
use Buzz\Control\Traits\SupportDelete;
use Buzz\Control\Traits\SupportRead;
use JTDSoft\EssentialsSdk\Cast;
use JTDSoft\EssentialsSdk\Collection;

/**
 * Class File
 *
 * @property string $identifier
 * @property string $title
 * @property string $description
 * @property string $visibility
 * @property string $filename
 * @property array $settings
 * @property boolean $system
 * @property-read string $url
 */
class File extends Object
{
    use Morphable,
        SupportRead,
        SupportDelete;

    /**
     * @param \Buzz\Control\Object $object
     *
     * @return \JTDSoft\EssentialsSdk\Collection
     */
    public function listFiles(BaseObject $object): Collection
    {
        $model_type = basename($object);
        $model_id   = $object->id;

        return Cast::many(
            self::class,
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/list"))
        );
    }

    /**
     * @param \Buzz\Control\Object $object
     * @param string $filename
     * @param string $content
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function add(BaseObject $object, string $filename, string $content)
    {
        $model_type = basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->post(
                $this->getEndpoint("{$model_type}/{$model_id}/add"),
                [
                    'file' => [
                        'content' => base64_encode($content),
                        'name'    => $filename,
                    ],
                ]
            )
        );
    }

    /**
     * @param \Buzz\Control\Object $object
     * @param string $identifier
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function systemFile(BaseObject $object, string $identifier)
    {
        $model_type = basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/{$identifier}/file"))
        );
    }

    /**
     * @param \Buzz\Control\Object $object
     * @param string $identifier
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function fileSettings(BaseObject $object, string $identifier)
    {
        $model_type = basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/{$identifier}/file-settings"))
        );
    }

    /**
     * @param \Buzz\Control\Object $object
     * @param string $identifier
     * @param string $filename
     * @param string $content
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function addSystem(BaseObject $object, string $identifier, string $filename, string $content)
    {
        $model_type = basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->post(
                $this->getEndpoint("{$model_type}/{$model_id}/{$identifier}/add"),
                [
                    'file' => [
                        'content' => base64_encode($content),
                        'name'    => $filename,
                    ],
                ]
            )
        );
    }

    /**
     * @return mixed
     */
    public function download()
    {
        return $this->api()->get($this->getEndpoint($this->id . '/download'));
    }
}
