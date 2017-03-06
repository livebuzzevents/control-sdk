<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Campaign
 *
 * @package Buzz\Control\Objects
 */
class Campaign extends Base
{
    use HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $channel_id;

    /**
     * @var Channel
     */
    protected $channel;

    /**
     * @var DateTime
     */
    protected $starts_at;

    /**
     * @var DateTime
     */
    protected $ends_at;

    /**
     * @var DateTime
     */
    protected $show_starts_at;

    /**
     * @var DateTime
     */
    protected $show_ends_at;

    /**
     * @var \Buzz\Control\Objects\File[]
     */
    protected $files;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getChannelId()
    {
        return $this->channel_id;
    }

    /**
     * @param string $channel_id
     */
    public function setChannelId($channel_id)
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @return Channel
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param Channel $channel
     */
    public function setChannel(Channel $channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return DateTime
     */
    public function getStartsAt()
    {
        return $this->starts_at;
    }

    /**
     * @param DateTime $starts_at
     */
    public function setStartsAt($starts_at)
    {
        $this->starts_at = $starts_at;
    }

    /**
     * @return DateTime
     */
    public function getEndsAt()
    {
        return $this->ends_at;
    }

    /**
     * @param DateTime $ends_at
     */
    public function setEndsAt($ends_at)
    {
        $this->ends_at = $ends_at;
    }

    /**
     * @return DateTime
     */
    public function getShowStartsAt()
    {
        return $this->show_starts_at;
    }

    /**
     * @param DateTime $show_starts_at
     */
    public function setShowStartsAt($show_starts_at)
    {
        $this->show_starts_at = $show_starts_at;
    }

    /**
     * @return DateTime
     */
    public function getShowEndsAt()
    {
        return $this->show_ends_at;
    }

    /**
     * @param DateTime $ends_at
     */
    public function setShowEndsAt($show_ends_at)
    {
        $this->show_ends_at = $show_ends_at;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param File[]|Collection $files
     */
    public function setFiles($files)
    {
        $this->files = new Collection($files);
    }
}
