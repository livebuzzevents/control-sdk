<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Campaign\Traits\Morphable;

/**
 * Class EntityListMember
 *
 * @property string $entity_list_id
 *
 * @property-read \Buzz\Control\Campaign\EntityList $entity_list
 */
class EntityListMember extends Object
{
    use Morphable;
}
