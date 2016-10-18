<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasIdentifier;

/**
 * Class Stream
 *
 * @package Buzz\Control\Objects
 */
class Stream extends Object
{
    use BelongsToCampaign, HasIdentifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $origin_url;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $audience;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var string
     */
    protected $repository;

    /**
     * @var \Buzz\Control\Objects\File[]
     */
    protected $files;

    /**
     * @var \Buzz\Control\Objects\Affiliate[]
     */
    protected $affiliates;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getOriginUrl()
    {
        return $this->origin_url;
    }

    /**
     * @param mixed $origin_url
     */
    public function setOriginUrl($origin_url)
    {
        $this->origin_url = $origin_url;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * @return mixed
     */
    public function getAudience()
    {
        return $this->audience;
    }

    /**
     * @param mixed
     */
    public function setAudience($audience)
    {
        $this->audience = $audience;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param mixed
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Affiliate[]|null
     */
    public function getAffiliates()
    {
        return $this->affiliates;
    }

    /**
     * @param Affiliate[]|Collection $affiliates
     */
    public function setAffiliates($affiliates)
    {
        $this->affiliates = new Collection($affiliates);
    }

    /**
     * @param Affiliate $affiliate
     */
    public function addAffiliate(Affiliate $affiliate)
    {
        $this->add($this->affiliates, $affiliate);
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param File[]|Collection $files
     */
    public function setFiles($files)
    {
        $this->files = new Collection($files);
    }
}