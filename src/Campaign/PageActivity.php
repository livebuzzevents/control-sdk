<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class PageActivity
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $target_id
 * @property string $target_type
 * @property string $page_id
 * @property int $action
 * @property-read object $target
 * @property-read \Buzz\Control\Campaign\Customer $customer
 * @property-read \Buzz\Control\Campaign\Exhibitor $exhibitor
 * @property-read \Buzz\Control\Campaign\Page $page
 */
class PageActivity extends SdkObject
{
    use SupportRead,
        SupportWrite;

    public function associate(SdkObject $object)
    {
        $this->data['target'] = $object;
        $this->target_type    = class_basename($object);
        $this->target_id      = $object->id;
    }

    public function complete()
    {
        return $this->api()->post($this->getEndpoint( 'complete'), $this->prepareRequestData());
    }
}
