<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\Traits\SupportDelete;
use Buzz\Control\Traits\SupportRead;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Collection;
use Buzz\Control\SdkObject as BaseSdkObject;

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
 * @property-read string $extension
 */
class File extends SdkObject
{
    use Morphable,
        SupportRead,
        SupportDelete;

    /**
     * @param BaseSdkObject $object
     *
     * @return \Buzz\EssentialsSdk\Collection
     * @throws \Buzz\EssentialsSdk\Exceptions\ErrorException
     */
    public function listFiles(BaseSdkObject $object): Collection
    {
        $model_type = class_basename($object);
        $model_id   = $object->id;

        return Cast::many(
            $this,
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/list"))
        );
    }

    /**
     * @param BaseSdkObject $object
     * @param string $filename
     * @param string $content
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function add(BaseSdkObject $object, string $filename, string $content, string $description)
    {
        $model_type = class_basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->post(
                $this->getEndpoint("{$model_type}/{$model_id}/add"),
                [
                    'file' => [
                        'content'     => base64_encode($content),
                        'name'        => $filename,
                        'description' => $description,
                    ],
                ]
            )
        );
    }

    /**
     * @param BaseSdkObject $object
     * @param string $identifier
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function systemFile(BaseSdkObject $object, string $identifier)
    {
        $model_type = class_basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/{$identifier}/file"))
        );
    }

    /**
     * @param BaseSdkObject $object
     * @param string $identifier
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function fileSettings(BaseSdkObject $object, string $identifier)
    {
        $model_type = class_basename($object);
        $model_id   = $object->id;

        return new self(
            $this->api()->get($this->getEndpoint("{$model_type}/{$model_id}/{$identifier}/file-settings"))
        );
    }

    /**
     * @param BaseSdkObject $object
     * @param string $identifier
     * @param string $filename
     * @param string $content
     *
     * @return \Buzz\Control\Campaign\File
     */
    public function addSystem(BaseSdkObject $object, string $identifier, string $filename, string $content)
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
