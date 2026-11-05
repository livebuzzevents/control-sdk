<?php

namespace Buzz\Control\Campaign\Traits;

use Buzz\Control\Campaign\Tag;

trait Taggable
{
    public function tag(string $tag)
    {
        return (new Tag)->tag($this, $tag);
    }

    public function untag(string $tag)
    {
        return (new Tag)->untag($this, $tag);
    }

    public function syncTags(?array $tags = null)
    {
        return (new Tag)->sync($this, $tags);
    }
}
