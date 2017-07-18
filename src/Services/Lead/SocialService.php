<?php namespace Buzz\Control\Services\Lead;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Lead;
use Buzz\Control\Services\Service;

/**
 * Class SocialService
 *
 * @package Buzz\Control\Services\Lead
 */
class SocialService extends Service
{
    /**
     * @var
     */
    protected static $cast = Lead\Social::class;

    /**
     * @param Lead $lead
     * @param Lead\Social $social
     *
     * @return Lead\Social
     * @throws ErrorException
     */
    public function get(Lead $lead, Lead\Social $social)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$social->getId()) {
            throw new ErrorException('Social id required!');
        }

        return $this->callAndCast('get', "lead/{$lead->getId()}/social/{$social->getId()}");
    }

    /**
     * @param Lead $lead
     * @param Lead\Social $social
     *
     * @throws ErrorException
     */
    public function delete(Lead $lead, Lead\Social $social)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if (!$social->getId()) {
            throw new ErrorException('Social id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/social/{$social->getId()}");
    }

    /**
     * @param Lead $lead
     * @param Lead\Social $social
     *
     * @return Lead\Social
     * @throws ErrorException
     */
    public function save(Lead $lead, Lead\Social $social)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        if ($social->getId()) {
            $verb = 'put';
            $url  = "lead/{$lead->getId()}/social/{$social->getId()}";
        } else {
            $verb = 'post';
            $url  = "lead/{$lead->getId()}/social";
        }

        return $this->callAndCast($verb, $url, $social->toArray());
    }

    /**
     * @param Lead $lead
     *
     * @throws ErrorException
     */
    public function deleteMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        $this->call('delete', "lead/{$lead->getId()}/socials");
    }

    /**
     * @param Lead $lead
     *
     * @return Lead\Social[]
     * @throws ErrorException
     */
    public function getMany(Lead $lead)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        return $this->callAndCastMany('get', "lead/{$lead->getId()}/socials");
    }

    /**
     * @param Lead $lead
     * @param Lead\Social[] $socials
     *
     * @return Lead\Social[]
     * @throws ErrorException
     */
    public function saveMany(Lead $lead, array $socials)
    {
        if (!$lead->getId()) {
            throw new ErrorException('Lead id required!');
        }

        foreach ($socials as $key => $social) {
            $socials[$key] = $social->toArray();
        }

        return $this->callAndCastMany('post', "lead/{$lead->getId()}/socials", ['batch' => $socials]);
    }
}
