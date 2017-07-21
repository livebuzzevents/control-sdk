<?php

namespace Buzz\Control\Campaign;

/**
 * Class SingleShot
 *
 * @property string $identifier
 * @property string $name
 * @property string $entity_list_id
 * @property object $template
 * @property string $template_id
 * @property string $template_type
 * @property \DateTime $sends_at
 * @property-read string $nice_type
 * @property-read boolean $allow_modification
 * @property-read \Buzz\Control\Campaign\SingleShotEntityListMember[] $members
 * @property-read \Buzz\Control\Campaign\EntityList[] $entity_list
 */
class SingleShot extends Object
{
}
