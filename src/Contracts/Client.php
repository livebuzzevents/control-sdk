<?php namespace Buzz\Control\Contracts;

interface Client
{
    public function post($method, array $request = []);

    public function get($method, array $request = []);

    public function delete($method, array $request = []);
}