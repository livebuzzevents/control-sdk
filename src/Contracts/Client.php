<?php namespace Buzz\Control\Contracts;

interface Client
{
    public function request($verb, $method, array $request = []);
}
