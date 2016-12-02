<?php

namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToCustomer;
use Buzz\Control\Objects\Traits\BelongsToExhibitor;
use Buzz\Control\Objects\Traits\BelongsToStreamMenuItem;

/**
 * Class StreamPageActivity
 *
 * @package Buzz\Contract\Objects
 */
class StreamPageActivity extends Base
{
    use BelongsToCustomer,
        BelongsToExhibitor,
        BelongsToStreamMenuItem;

    /**
     * @var string
     */
    protected $action;

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
}
