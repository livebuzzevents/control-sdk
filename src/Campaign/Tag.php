<?php

namespace Buzz\Control\Campaign;

/**
 * Class Tag
 *
 * @property string $name
 *
 * @property-read \Buzz\Control\Campaign\Customer[] $customers
 * @property-read \Buzz\Control\Campaign\Exhibitor[] $exhibitors
 */
/**
 * Class Tag
 *
 * @package Buzz\Control\Campaign
 */
class Tag extends SdkObject
{
    /**
     * @param SdkObject $model
     * @param string $tag
     */
    public function tag(SdkObject $model, string $tag)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/tag/' . $tag,
            compact('model_type', 'model_id')
        );
    }

    /**
     * @param SdkObject $model
     * @param string $tag
     */
    public function untag(SdkObject $model, string $tag)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/untag/' . $tag,
            compact('model_type', 'model_id')
        );
    }

    /**
     * @param SdkObject $model
     * @param array|null $tags
     */
    public function sync(SdkObject $model, array $tags = null)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/sync',
            compact('tags', 'model_type', 'model_id')
        );
    }
}
