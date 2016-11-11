<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCreator;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToSeminar;

/**
 * Class Customer
 *
 * @package Buzz\Contract\Objects
 */
class CustomerSeminar extends Base
{
    use BelongsToCreator,
        BelongsToCustomer,
        BelongsToSeminar;

    /**
     * @var string
     */
    protected $role;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
