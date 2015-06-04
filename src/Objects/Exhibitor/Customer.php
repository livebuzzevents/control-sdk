<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;

/**
 * Class Customer
 *
 * @package Buzz\Control\Objects\Exhibitor
 */
class Customer extends \Buzz\Control\Objects\Customer
{
    /**
     * @var
     */
    protected $pivot;
    /**
     * @var
     */
    protected $role;

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role ?: $this->pivot['role'];
    }

    /**
     * @param mixed $role
     *
     * @throws ErrorException
     */
    public function setRole($role)
    {
        if (!in_array($role, ['basic', 'leader'])) {
            throw new ErrorException("Invalid role '{$role}'!");
        }
        $this->role = $role;
    }
}