<?php namespace Buzz\Control\Objects\Exhibitor;

use Buzz\Control\Objects\Base;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Property
 *
 * @package Buzz\Control\Exhibitor
 */
class PressRelease extends Base
{
    use HasIdentifier, BelongsToExhibitor;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $content;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
