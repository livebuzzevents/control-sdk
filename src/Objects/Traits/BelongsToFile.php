<?php

namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Objects\File;

/**
 * Class BelongsToFile
 *
 * @package Buzz\Control\Objects\Traits
 */
trait BelongsToFile
{
    /**
     * @var string
     */
    protected $file_id;

    /**
     * @var \Buzz\Control\Objects\File
     */
    protected $file;

    /**
     * @return \Buzz\Control\Objects\File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param File $file
     */
    public function setFile(File $file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getFileId()
    {
        return $this->file_id;
    }

    /**
     * @param string $file_id
     */
    public function setFileId($file_id)
    {
        $this->file_id = $file_id;
    }
}