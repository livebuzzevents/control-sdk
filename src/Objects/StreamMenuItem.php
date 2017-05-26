<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToStream;
use Buzz\Control\Objects\Traits\HasIdentifier;
use Buzz\Control\Objects\Traits\HasPropertiesCommon;

/**
 * Class StreamMenuItem
 *
 * @package Buzz\Contract\Objects
 */
class StreamMenuItem extends Base
{
    use BelongsToStream,
        HasPropertiesCommon,
        HasIdentifier;

    /**
     * @var string
     */
    protected $parent_id;

    /**
     * @var \Buzz\Control\Objects\StreamMenuItem
     */
    protected $parent;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var string
     */
    protected $color;

    /**
     * @var string
     */
    protected $background_image;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $active;

    /**
     * @var string
     */
    protected $locked;

    /**
     * @var \Buzz\Control\Objects\StreamMenuItem\Property[]
     */
    protected $properties;

    /**
     * @var \Buzz\Control\Objects\File[]
     */
    protected $files;

    /**
     * @var \Buzz\Control\Objects\StreamPageQuestion[]
     */
    protected $questions;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @return string
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * @param string $parent_id
     */
    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getBackgroundImage()
    {
        return $this->background_image;
    }

    /**
     * @param mixed
     */
    public function setBackgroundImage($background_image)
    {
        $this->background_image = $background_image;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * @param mixed
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * @param StreamMenuItem\Property[]|Collection $properties
     */
    public function setProperties($properties)
    {
        $this->properties = new Collection($properties);
    }

    /**
     * @param StreamMenuItem\Property $property
     */
    public function addProperty(StreamMenuItem\Property $property)
    {
        $this->add($this->properties, $property);
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

    /**
     * @return \Buzz\Control\Objects\StreamPageQuestion[]|Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @return mixed
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param array $settings
     */
    public function setSetting(array $settings)
    {
        $this->settings = $settings;
    }
}
