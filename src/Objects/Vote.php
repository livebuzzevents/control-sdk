<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\CreatedByCustomer;

/**
 * Class Vote
 *
 * @package Buzz\Control
 */
class Vote extends Base
{
    use CreatedByCustomer;

    /**
     * @var \Buzz\Control\Objects\VoteGroup
     */
    protected $group;

    /**
     * @var string
     */
    protected $group_id;

    /**
     * @var string
     */
    protected $model_type;

    /**
     * @var string
     */
    protected $model_id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @return VoteGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param VoteGroup $group
     */
    public function setGroup(VoteGroup $group)
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param string $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return string
     */
    public function getModelId()
    {
        return $this->model_id;
    }

    /**
     * @param string $model_id
     */
    public function setModelId($model_id)
    {
        $this->model_id = $model_id;
    }

    /**
     * @return string
     */
    public function getModelType()
    {
        return $this->model_type;
    }

    /**
     * @param string $model_type
     */
    public function setModelType($model_type)
    {
        $this->model_type = $model_type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
