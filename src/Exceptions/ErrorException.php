<?php namespace Buzz\Control\Exceptions;

use Exception;

class ErrorException extends Exception
{
    protected $error;

    public function __construct($error)
    {
        $this->error   = $error;
        $this->message = var_export($this->error, true);
    }

    public function getError()
    {
        return $this->error;
    }
}