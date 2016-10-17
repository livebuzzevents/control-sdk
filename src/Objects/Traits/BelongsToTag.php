<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\Tag;

/**
 * Class BelongsToTag
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToTag
{
    /**
     * @var string
     */
    protected $tag_id;

    /**
     * @var \Buzz\Control\Objects\Tag
     */
    protected $tag;

    /**
     * @return \Buzz\Control\Objects\Tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param \Buzz\Control\Objects\Tag $tag
     */
    public function setTag(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return string
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * @param string $tag_id
     */
    public function setTagId($tag_id)
    {
        $this->tag_id = $tag_id;
    }
}