<?php namespace Buzz\Control;

use ArrayIterator;
use IteratorAggregate;

class Filter implements IteratorAggregate
{
    /**
     * @var array
     */
    protected $filters = [];

    /**
     * @var array
     */
    protected $groups = [];

    /**
     * @param $filters
     *
     * @return $this
     */
    public function set($filters)
    {
        if (empty($filters) || !is_array($filters)) {
            return $this;
        }

        foreach ($filters as $single) {
            if (isset($single['group'])) {
                $group = new self();
                $group->set($single['group']);
                if (isset($single['or'])) {
                    $this->addGroup($group, $single['or']);
                } else {
                    $this->addGroup($group);
                }
            } else {
                $this->add(...array_values($single));
            }
        }

        return $this;
    }

    /**
     * @param Filter $group
     * @param bool $or
     *
     * @return $this
     */
    public function addGroup(Filter $group, $or = false)
    {
        array_push(
            $this->groups,
            compact('group', 'or')
        );

        return $this;
    }

    /**
     * @param      $parameter
     * @param      $operator
     * @param      $value
     * @param bool $or
     *
     * @return $this
     */
    public function add($parameter, $operator, $value = null, $or = false)
    {
        //@todo REMOVE THIS ONES CAMPAIGN IS REMOVE FROM ALL PROJECTS
        if (strpos($parameter, 'campaign') !== false) {
            return $this;
        }

        array_push(
            $this->filters,
            [$parameter, $operator, $value, $or]
        );

        return $this;
    }

    /**
     * @param array $parameters
     * @param       $term_string
     *
     * @return $this
     */
    public function addSearchTerm(array $parameters, $term_string)
    {
        if (empty($term_string) || empty($parameters)) {
            return;
        }

        $terms = preg_split('/\s+/', $term_string);

        $parameters[] = 'id';

        $parameter_first = reset($parameters);

        foreach ($terms as $term) {
            $group = new self();

            foreach ($parameters as $parameter) {
                $group->add($parameter, 'contains', $term, $parameter !== $parameter_first);
            }

            $this->addGroup($group);
        }

        return $this;
    }

    /**
     * @param ...$params
     *
     * @return Filter
     */
    public function orGroup(...$params)
    {
        $params[] = true;

        return $this->addGroup(...$params);
    }

    /**
     * @param callable $callback
     * @param bool $or
     *
     * @return $this
     */
    public function group(callable $callback, $or = false)
    {
        $group = new self();

        $this->groups[] = compact('group', 'or');

        $callback($group);

        return $this;
    }

    /**
     * @return $this
     */
    public function clear()
    {
        $this->filters = [];
        $this->groups  = [];

        return $this;
    }

    /**
     * @param array ...$params
     *
     * @return Filter
     */
    public function orAdd(...$params)
    {
        if (count($params) == 2) {
            $params[] = null;
        }

        if (count($params) == 3) {
            $params[] = true;
        }

        return $this->add(...$params);
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function toArray()
    {
        $groups = $this->groups;

        foreach ($groups as $key => $group) {
            $groups[$key]['group'] = $group['group']->toArray();
        }

        return array_merge($this->filters, $groups);
    }

    /**
     * Get an iterator for the filters.
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->toArray());
    }
}
