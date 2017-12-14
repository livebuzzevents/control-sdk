<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\VoteGroup;

/**
 * Class VoteGroupService
 *
 * @package Buzz\Control\Services
 */
class VoteGroupService extends Service
{
    /**
     * @var
     */
    protected static $cast = VoteGroup::class;

    /**
     * @param VoteGroup $voteGroup
     *
     * @return VoteGroup
     * @throws ErrorException
     */
    public function get(VoteGroup $voteGroup)
    {
        if (!$voteGroup->getId()) {
            throw new ErrorException('VoteGroup id required!');
        }

        return $this->callAndCast('get', "vote-group/{$voteGroup->getId()}");
    }

    /**
     * @param VoteGroup $voteGroup
     *
     * @throws ErrorException
     */
    public function delete(VoteGroup $voteGroup)
    {
        if (!$voteGroup->getId()) {
            throw new ErrorException('VoteGroup id required!');
        }

        $this->call('delete', "vote-group/{$voteGroup->getId()}");
    }

    /**
     * @param VoteGroup $voteGroup
     *
     * @return VoteGroup
     * @throws ErrorException
     */
    public function save(VoteGroup $voteGroup)
    {
        if ($voteGroup->getId()) {
            $verb = 'put';
            $url  = 'vote-group/' . $voteGroup->getId();
        } else {
            $verb = 'post';
            $url  = 'vote-group';
        }

        return $this->callAndCast($verb, $url, $voteGroup->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'vote-groups');
    }

    /**
     * @return VoteGroup[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'vote-groups');
    }

    /**
     * @param VoteGroup[] $voteGroups
     *
     * @return VoteGroup[]
     * @throws ErrorException
     */
    public function saveMany(array $voteGroups)
    {
        foreach ($voteGroups as $key => $voteGroup) {
            $voteGroups[$key] = $voteGroup->toArray();
        }

        return $this->callAndCastMany('post', 'vote-groups', ['batch' => $voteGroups]);
    }
}
