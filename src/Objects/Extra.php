<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToCustomer;

/**
 * Class Order
 *
 * @package Buzz\Control\Objects
 */
class Extra extends Object
{
    use BelongsToCustomer;

    /**
     * @var string
     */
    protected $model_name;

    /**
     * @var string
     */
    protected $model_id;

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
    public function getModelName()
    {
        return $this->model_name;
    }

    /**
     * @param string $model_name
     */
    public function setModelName($model_name)
    {
        $this->model_name = $model_name;
    }
}
