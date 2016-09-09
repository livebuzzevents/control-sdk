<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToSeminar
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToSeminar
{
    /**
     * @var string
     */
    protected $seminar_id;

    /**
     * @var \Buzz\Control\Objects\Seminar
     */
    protected $seminar;

    /**
     * @return \Buzz\Control\Objects\Seminar
     */
    public function getSeminar()
    {
        return $this->seminar;
    }

    /**
     * @return string
     */
    public function getSeminarId()
    {
        return $this->seminar_id;
    }

    /**
     * @param string $seminar_id
     */
    public function setSeminarId($seminar_id)
    {
        $this->seminar_id = $seminar_id;
    }
}
