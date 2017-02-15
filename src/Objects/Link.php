<?php namespace Buzz\Control\Objects;

/**
 * Class Link
 *
 * @package Buzz\Control
 */
class Link extends Base
{
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
    protected $type;

    /**
     * @var string
     */
    protected $url;

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

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
