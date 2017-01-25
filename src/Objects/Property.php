<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToParameter;

/**
 * Class Property
 *
 * @package Buzz\Control
 */
class Property extends Base
{
    use BelongsToParameter;

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
    protected $value;

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
