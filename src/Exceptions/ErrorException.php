<?php namespace Buzz\Control\Exceptions;

use Exception;

class ErrorException extends Exception
{
    protected $error;

    public function __construct($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }
}