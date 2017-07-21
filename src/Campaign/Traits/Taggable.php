<?php

namespace Buzz\Control\Campaign\Traits;

use Buzz\Control\Campaign\Tag;

trait Taggable
{
    /**
     * @param string $tag
     */
    public function tag(string $tag)
    {
        return (new Tag())->tag($this, $tag);
    }

    /**
     * @param string $tag
     */
    public function untag(string $tag)
    {
        return (new Tag())->untag($this, $tag);
    }

    /**
     * @param array|null $tags
     */
    public function syncTags(array $tags = null)
    {
        return (new Tag())->sync($this, $tags);
    }
}
