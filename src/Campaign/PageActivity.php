<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Traits\SupportRead;
use Buzz\Control\Traits\SupportWrite;

/**
 * Class PageActivity
 *
 * @property string $customer_id
 * @property string $exhibitor_id
 * @property string $file_id
 * @property string $target_id
 * @property string $target_type
 * @property string $page_id
 * @property string $action
 * @property-read object $target
 * @property-read Customer $customer
 * @property-read Exhibitor $exhibitor
 * @property-read File $file
 * @property-read Page $page
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
        return $this->api()->post($this->getEndpoint('complete'), $this->prepareRequestData());
    }
}
