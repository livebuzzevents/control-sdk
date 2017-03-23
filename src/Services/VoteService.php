<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Vote;

/**
 * Class VoteService
 *
 * @package Buzz\Control\Services
 */
class VoteService extends Service
{
    /**
     * @var
     */
    protected static $cast = Vote::class;

    /**
     * @param Vote $vote
     *
     * @return Vote
     * @throws ErrorException
     */
    public function get(Vote $vote)
    {
        if (!$vote->getId()) {
            throw new ErrorException('Vote id required!');
        }

        return $this->callAndCast('get', "vote/{$vote->getId()}");
    }

    /**
     * @param Vote $vote
     *
     * @throws ErrorException
     */
    public function delete(Vote $vote)
    {
        if (!$vote->getId()) {
            throw new ErrorException('Vote id required!');
        }

        $this->call('delete', "vote/{$vote->getId()}");
    }

    /**
     * @param Vote $vote
     *
     * @return Vote
     * @throws ErrorException
     */
    public function save(Vote $vote)
    {
        if ($vote->getId()) {
            $verb = 'put';
            $url  = 'vote/' . $vote->getId();
        } else {
            $verb = 'post';
            $url  = 'vote';
        }

        return $this->callAndCast($verb, $url, $vote->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'votes');
    }

    /**
     * @return Vote[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'votes');
    }

    /**
     * @param Vote[] $votes
     *
     * @return Vote[]
     * @throws ErrorException
     */
    public function saveMany(array $votes)
    {
        foreach ($votes as $key => $vote) {
            $votes[$key] = $vote->toArray();
        }

        return $this->callAndCastMany('post', 'votes', ['batch' => $votes]);
    }
}
