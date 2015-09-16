<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Parameter;

/**
 * Class ParameterService
 *
 * @package Buzz\Control\Services
 */
class ParameterService extends Service
{
    /**
     * @var
     */
    protected static $cast = Parameter::class;

    /**
     * @param Parameter $parameter
     *
     * @return Parameter
     * @throws ErrorException
     */
    public function get(Parameter $parameter)
    {
        if (!$parameter->getId()) {
            throw new ErrorException('Parameter id required!');
        }

        return $this->callAndCast('get', "parameter/{$parameter->getId()}");
    }

    /**
     * @param Parameter $parameter
     *
     * @throws ErrorException
     */
    public function delete(Parameter $parameter)
    {
        if (!$parameter->getId()) {
            throw new ErrorException('Parameter id required!');
        }

        $this->call('delete', "parameter/{$parameter->getId()}");
    }

    /**
     * @param Parameter $parameter
     *
     * @return Parameter
     * @throws ErrorException
     */
    public function save(Parameter $parameter)
    {
        if (!$parameter->getId() && !$parameter->getCampaignId() && !$parameter->getCampaign()) {
            throw new ErrorException('Parameter id or Campaign id/identifier required!');
        }

        if ($parameter->getId()) {
            $verb = 'put';
            $url  = 'parameter/' . $parameter->getId();
        } else {
            $verb = 'post';
            $url  = 'parameter';
        }

        return $this->callAndCast($verb, $url, $parameter->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'parameters');
    }

    /**
     * @return Parameter[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'parameters');
    }

    /**
     * @param Parameter[] $parameters
     *
     * @return Parameter[]
     * @throws ErrorException
     */
    public function saveMany(array $parameters)
    {
        foreach ($parameters as $key => $parameter) {
            if (!$parameters->getId() && !$parameters->getCampaignId() && !$parameters->getCampaign()) {
                throw new ErrorException('BadgeType id or Campaign id/identifier required!');
            }
            $parameters[$key] = $parameter->toArray();
        }

        return $this->callAndCastMany('post', 'parameters', ['batch' => $parameters]);
    }
}