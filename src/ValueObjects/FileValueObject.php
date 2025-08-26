<?php

namespace Buzz\Helpers\ValueObjects;

use Buzz\Control\Campaign\File;

class FileValueObject
{
    /** @var string */
    public $id;

    /** @var string */
    public $identifier;

    /** @var string */
    public $model_id;

    /** @var string */
    public $model_type;

    /** @var string */
    public $description;

    /** @var string */
    public $visibility;

    /** @var string */
    public $filename;

    /** @var string */
    public $extension;

    /** @var string */
    public $category;

    public function __construct(File $file)
    {
        $this->id          = $file->id;
        $this->identifier  = $file->identifier;
        $this->model_id    = $file->model_id;
        $this->model_type  = $file->model_type;
        $this->description = $file->description;
        $this->visibility  = $file->visibility;
        $this->filename    = $file->filename;
        $this->extension   = $file->extension;
        $this->category    = $file->category;
    }
}
