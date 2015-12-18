<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Invite;

/**
 * Class InviteService
 *
 * @package Buzz\Control\Services
 */
class InviteService extends Service
{
    /**
     * @var
     */
    protected static $cast = Invite::class;

    /**
     * @param Invite $invite
     *
     * @return Invite
     * @throws ErrorException
     */
    public function get(Invite $invite)
    {
        if (!$invite->getId()) {
            throw new ErrorException('Invite id required!');
        }

        return $this->callAndCast('get', "invite/{$invite->getId()}");
    }

    /**
     * @param Invite $invite
     *
     * @throws ErrorException
     */
    public function delete(Invite $invite)
    {
        if (!$invite->getId()) {
            throw new ErrorException('Invite id required!');
        }

        $this->call('delete', "invite/{$invite->getId()}");
    }

    /**
     * @param Invite $invite
     *
     * @return Invite
     * @throws ErrorException
     */
    public function save(Invite $invite)
    {
        if (!$invite->getId() && !$invite->getCampaignId() && !$invite->getCampaign()) {
            throw new ErrorException('Invite id or Campaign id/identifier required!');
        }

        if ($invite->getId()) {
            $verb = 'put';
            $url  = 'invite/' . $invite->getId();
        } else {
            $verb = 'post';
            $url  = 'invite';
        }

        return $this->callAndCast($verb, $url, $invite->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'invites');
    }

    /**
     * @return Invite[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'invites');
    }

    /**
     * @param Invite[] $invites
     *
     * @return Invite[]
     * @throws ErrorException
     */
    public function saveMany(array $invites)
    {
        foreach ($invites as $key => $invite) {
            if (!$invite->getId() && !$invite->getCampaignId() && !$invite->getCampaign()) {
                throw new ErrorException('Invite id or Campaign id/identifier required!');
            }

            $invites[$key] = $invite->toArray();
        }

        return $this->callAndCastMany('post', 'invites', ['batch' => $invites]);
    }
}
