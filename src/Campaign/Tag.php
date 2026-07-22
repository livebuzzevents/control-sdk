<?php

namespace Buzz\Control\Campaign;

/**
 * Class Tag
 *
 * @property string $name
 * @property-read Customer[] $customers
 * @property-read Exhibitor[] $exhibitors
 */
/**
 * Class Tag
 */
class Tag extends SdkObject
{
    public function tag(SdkObject $model, string $tag)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/tag/'.$tag,
            compact('model_type', 'model_id')
        );
    }

    public function untag(SdkObject $model, string $tag)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/untag/'.$tag,
            compact('model_type', 'model_id')
        );
    }

    public function sync(SdkObject $model, ?array $tags = null)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/sync',
            compact('tags', 'model_type', 'model_id')
        );
    }
}
