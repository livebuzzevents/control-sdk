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
class Tag extends Object
{
    /**
     * @param Object $model
     * @param string $tag
     */
    public function tag(Object $model, string $tag)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/tag/' . $tag,
            compact('model_type', 'model_id')
        );
    }

    /**
     * @param Object $model
     * @param string $tag
     */
    public function untag(Object $model, string $tag)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/untag/' . $tag,
            compact('model_type', 'model_id')
        );
    }

    /**
     * @param Object $model
     * @param array|null $tags
     */
    public function sync(Object $model, array $tags = null)
    {
        $model_type = class_basename($model);
        $model_id   = $model->id;

        $this->api()->post(
            'tags/sync',
            compact('tags', 'model_type', 'model_id')
        );
    }
}
