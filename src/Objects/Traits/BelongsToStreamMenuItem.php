<?php namespace Buzz\Control\Objects\Traits;

/**
 * Class BelongsToStreamMenuItem
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToStreamMenuItem
{
    /**
     * @var string
     */
    protected $stream_menu_item_id;

    /**
     * @var \Buzz\Control\Objects\StreamMenuItem
     */
    protected $stream_menu_item;

    /**
     * @return \Buzz\Control\Objects\StreamMenuItem
     */
    public function getStreamMenuItem()
    {
        return $this->stream_menu_item;
    }

    /**
     * @return string
     */
    public function getStreamMenuItemId()
    {
        return $this->stream_menu_item_id;
    }

    /**
     * @param string $stream_menu_item_id
     */
    public function setStreamMenuItemId($stream_menu_item_id)
    {
        $this->stream_menu_item_id = $stream_menu_item_id;
    }
}
