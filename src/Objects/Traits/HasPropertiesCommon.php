<?php namespace Buzz\Control\Objects\Traits;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Parameter;

trait HasPropertiesCommon
{
    public function hasPropertyParameter(Parameter $parameter)
    {
        return (bool)$this->getPropertyByParameter($parameter);
    }

    public function getPropertyByParameter(Parameter $parameter)
    {
        if (!$this->properties) {
            return null;
        }

        foreach ($this->properties as $property) {
            if ($parameter->getId()) {
                if ($property->getParameter()->getId() === $parameter->getId()) {
                    return $property;
                }
            } elseif ($parameter->getIdentifier()) {
                if ($property->getParameter()->getIdentifier() === $parameter->getIdentifier()) {
                    return $property;
                }
            }
        }

        return null;
    }

    public function getPropertyByIdentifier($identifier)
    {
        $parameter = new Parameter();
        $parameter->setIdentifier($identifier);

        return $this->getPropertyByParameter($parameter);
    }

    public function getPropertyedIdentifiers()
    {
        return array_keys($this->getPropertiesGroupedByIdentifier());
    }

    public function getPropertiesGroupedByIdentifier()
    {
        if (!$this->properties) {
            return null;
        }

        $properties = [];

        foreach ($this->properties as $property) {
            $properties[$property->getParameter()->getIdentifier()] = $property;
        }

        return new Collection($properties);
    }

    public function getPropertiesByIdentifiers(array $identifiers)
    {
        if (!$this->properties) {
            return null;
        }

        $properties = $this->getPropertiesGroupedByIdentifier();

        $match = null;

        foreach ($properties as $identified => $property) {
            if (in_array($identified, $identifiers)) {
                $match[$identified] = $property;
            }
        }

        return $match ?: new Collection($match);
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
    return $this->properties;
    }
}