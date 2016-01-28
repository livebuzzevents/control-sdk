<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class HasMatchId
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasMatchId
{
    /**
     * @var string
     */
    protected $match_id;

    /**
     * @return string
     */
    public function getMatchId()
    {
        return $this->match_id;
    }

    /**
     * @param string $match_id
     */
    public function setMatchId($match_id)
    {
        $this->match_id = $match_id;
    }
}