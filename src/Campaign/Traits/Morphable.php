<?php namespace Buzz\Control\Campaign\Traits;

use Buzz\Control\Campaign\SdkObject;

/**
 * trait Morphable
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 */
trait Morphable
{
    public function associate(SdkObject $object)
    {
        $this->data['model'] = $object;
        $this->model_type    = class_basename($object);
        $this->model_id      = $object->id;
    }
}
