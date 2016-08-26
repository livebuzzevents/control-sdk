<?php

namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Topic;

/**
 * Class TopicService
 *
 * @package Buzz\Control\Services
 */
class TopicService extends Service
{
    /**
     * @var
     */
    protected static $cast = Topic::class;

    /**
     * @param Topic $topic
     *
     * @return Topic
     * @throws ErrorException
     */
    public function get(Topic $topic)
    {
        if (!$topic->getId()) {
            throw new ErrorException('Topic id required!');
        }

        return $this->callAndCast('get', "topic/{$topic->getId()}");
    }

    /**
     * @param Topic $topic
     *
     * @throws ErrorException
     */
    public function delete(Topic $topic)
    {
        if (!$topic->getId()) {
            throw new ErrorException('Topic id required!');
        }

        $this->call('delete', "topic/{$topic->getId()}");
    }

    /**
     * @param Topic $topic
     *
     * @return Topic
     * @throws ErrorException
     */
    public function save(Topic $topic)
    {
        if (!$topic->getId() && !$topic->getCampaignId() && !$topic->getCampaign()) {
            throw new ErrorException('Topic id or Campaign id/identifier required!');
        }

        if ($topic->getId()) {
            $verb = 'put';
            $url  = 'topic/' . $topic->getId();
        } else {
            $verb = 'post';
            $url  = 'topic';
        }

        return $this->callAndCast($verb, $url, $topic->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'topics');
    }

    /**
     * @return Topic[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'topics');
    }

    /**
     * @param Topic[] $topics
     *
     * @return Topic[]
     * @throws ErrorException
     */
    public function saveMany(array $topics)
    {
        foreach ($topics as $key => $topic) {
            if (!$topic->getId() && !$topic->getCampaignId() && !$topic->getCampaign()) {
                throw new ErrorException('Topic id or Campaign id/identifier required!');
            }

            $topics[$key] = $topic->toArray();
        }

        return $this->callAndCastMany('post', 'topics', ['batch' => $topics]);
    }
}
