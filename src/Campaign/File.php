<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\SdkObject;
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
class File extends SdkObject
{
    use Morphable,
        SupportRead,
        SupportDelete;

    /**
     * @param \Buzz\Control\SdkObject $object
     *
     * @return \JTDSoft\EssentialsSdk\Collection
     * @throws \JTDSoft\EssentialsSdk\Exceptions\ErrorException
     */
    public function listFiles(SdkObject $object): Collection
    {
        $model_type = class_basename($object);
        $model_id   = $object->id;

        return Cast::many(
            $this,
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/list"))
        );
    }

    /**
     * @param \Buzz\Control\SdkObject $object
     * @param string $filename
     * @param string $content
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function add(SdkObject $object, string $filename, string $content)
    {
        $model_type = class_basename($object);
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
     * @param \Buzz\Control\SdkObject $object
     * @param string $identifier
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function systemFile(SdkObject $object, string $identifier)
    {
        $model_type = class_basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/{$identifier}/file"))
        );
    }

    /**
     * @param \Buzz\Control\SdkObject $object
     * @param string $identifier
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function fileSettings(SdkObject $object, string $identifier)
    {
        $model_type = class_basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/{$identifier}/file-settings"))
        );
    }

    /**
     * @param \Buzz\Control\SdkObject $object
     * @param string $identifier
     * @param string $filename
     * @param string $content
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function addSystem(SdkObject $object, string $identifier, string $filename, string $content)
    {
        $model_type = class_basename($object);
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
