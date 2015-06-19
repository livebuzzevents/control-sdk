<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class HasSource
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasSource
{
    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $source_id;

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * @param string $source_id
     */
    public function setSourceId($source_id)
    {
        $this->source_id = $source_id;
    }
}