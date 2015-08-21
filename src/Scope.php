<?php namespace Buzz\Control;

/**
 * Class Scope
 *
 * Manages the scope for the SDK REST calls
 *
 * @package Buzz\Control
 */
class Scope
{
    private $scope;

    public function add($channel, array $campaigns = null)
    {
        $this->scope[$channel] = $campaigns ?: true;
    }

    public function getScope()
    {
        return $this->scope;
    }
}