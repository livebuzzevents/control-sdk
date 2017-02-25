<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToStream;
use Buzz\Control\Objects\Traits\CreatedByCustomer;
use Buzz\Control\Objects\Traits\CreatedByExhibitor;

/**
 * Class Note
 *
 * @package Buzz\Control\Objects
 */
class Note extends Base
{
    /**
     * @var string
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $model_id;

    /**
     * @var string
     */
    protected $model_type;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
