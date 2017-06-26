<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToVote
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToVote
{
    /**
     * @var string
     */
    protected $vote_id;

    /**
     * @var \Buzz\Control\Objects\Vote
     */
    protected $vote;

    /**
     * @return \Buzz\Control\Objects\Vote
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * @return string
     */
    public function getVoteId()
    {
        return $this->vote_id;
    }

    /**
     * @param string $vote_id
     */
    public function setVoteId($vote_id)
    {
        $this->vote_id = $vote_id;
    }
}