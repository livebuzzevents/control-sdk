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
}
