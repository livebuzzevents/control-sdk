<?php namespace Buzz\Control\Contracts;

interface Service
{
    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod();

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl();

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest();
}