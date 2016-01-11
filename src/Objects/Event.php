<?php namespace Buzz\Control\Objects;

/**
 * Class ReplicationLog
 *
 * @package Buzz\Control\Objects
 */
class Event extends Object
{
    /**
     * @var string
     */
    protected $node_name;

    /**
     * @var int
     */
    protected $node_sequence;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $model_id;

    /**
     * @var array
     */
    protected $data;

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
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
    public function getNodeName()
    {
        return $this->node_name;
    }

    /**
     * @param string $node_name
     */
    public function setNodeName($node_name)
    {
        $this->node_name = $node_name;
    }

    /**
     * @return int
     */
    public function getNodeSequence()
    {
        return $this->node_sequence;
    }

    /**
     * @param int $node_sequence
     */
    public function setNodeSequence($node_sequence)
    {
        $this->node_sequence = $node_sequence;
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