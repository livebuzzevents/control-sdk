<?php

namespace Buzz\Control\Campaign;

use Buzz\Control\Object;

/**
 * Class Vote
 *
 * @property-read object $model
 * @property string $model_type
 * @property string $model_id
 * @property string $name
 * @property string $email
 * @property string $group_id
 * @property string $created_by_customer_id
 * @property-read \Buzz\Control\Campaign\VoteGroup[] $group
 * @property-read \Buzz\Control\Campaign\Customer $created_by_customer
 * @property-read \Buzz\Control\Campaign\Answer[] $answers
 *
 */
class Vote extends Object
{
}
