<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Collection;

/**
 * Class HasLinks
 *
 * @package Buzz\Control\Objects\Traits
 */
trait HasLinks
{
    /**
     * @var \Buzz\Control\Objects\Link[]
     */
    protected $links;

    /**
     * @param string $type
     * @return bool
     */
    public function hasLinkType($type)
    {
        return (bool)$this->getLinkByType($type);
    }

    /**
     * @param $type
     * @return \Buzz\Control\Objects\Link|null
     */
    public function getLinkByType($type)
    {
        if (!$this->links) {
            return null;
        }

        foreach ($this->links as $link) {
            if ($link->getType() === $type) {
                return $link;
            }
        }

        return null;
    }

    public function getLinkTypes()
    {
        return $this->getLinksGroupedByType()->keys();
    }

    /**
     * @return Collection|null
     */
    public function getLinksGroupedByType()
    {
        if (!$this->links) {
            return null;
        }

        $links = [];

        foreach ($this->links as $link) {
            $links[$link->getType()] = $link;
        }

        return new Collection($links);
    }

    /**
     * @param array $types
     *
     * @return Collection|null
     */
    public function getLinksByTypes(array $types)
    {
        if (!$this->links) {
            return null;
        }

        $links = $this->getLinksGroupedByType();

        $match = null;

        foreach ($links as $type => $link) {
            if (in_array($type, $types)) {
                $match[$type] = $link;
            }
        }

        return $match ?: new Collection($match);
    }

    /**
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }
}