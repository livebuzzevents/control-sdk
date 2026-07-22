<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;
use Buzz\Control\SdkObject as BaseSdkObject;
use Buzz\Control\Traits\SupportDelete;
use Buzz\Control\Traits\SupportRead;
use Buzz\EssentialsSdk\Cast;
use Buzz\EssentialsSdk\Collection;
use Buzz\EssentialsSdk\Exceptions\ErrorException;

/**
 * Class File
 *
 * @property string $identifier
 * @property string $title
 * @property string $description
 * @property string $visibility
 * @property string $filename
 * @property array $settings
 * @property bool $system
 * @property-read string $url
 * @property-read string $extension
 */
class File extends SdkObject
{
    use Morphable,
        SupportDelete,
        SupportRead;

    /**
     * @throws ErrorException
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
     * @return File
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
     * @return File
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
     * @return File
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
     * @return File
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
        return $this->api()->get($this->getEndpoint($this->id.'/download'));
    }
}
