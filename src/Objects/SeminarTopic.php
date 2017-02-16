<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToSeminar;

/**
 * Class SeminarTopic
 *
 * @package Buzz\Contract\Objects
 */
class SeminarTopic extends Base
{
    use BelongsToSeminar;

    /**
     * @var \Buzz\Control\Objects\Topic
     */
    protected $topic;

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param \Buzz\Control\Objects\Topic $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }
}
