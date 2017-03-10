<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class EmailMessageTemplate
 *
 * @package Buzz\Control\Objects\EmailMessageTemplate
 */
class EmailMessageTemplate extends Base
{
    use HasIdentifier;

    /**
     * @var string
     */
    protected $html;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var \Buzz\Control\Objects\File[]
     */
    protected $files;

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
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param string $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }

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
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
}
