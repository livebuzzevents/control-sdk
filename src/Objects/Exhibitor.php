<?php namespace Buzz\Control\Objects;

/**
 * Class Exhibitor
 *
 * @package Buzz\Control\Objects
 */
use Buzz\Control\Exceptions\ErrorException;

/**
 * Class Exhibitor
 *
 * @package Buzz\Control\Objects
 */
class Exhibitor extends Object
{
    /**
     * @var array
     */
    protected $objectMap = [
        'badges'     => Badge::class,
        'customers'  => Exhibitor\Customer::class,
        'owner'      => Exhibitor::class,
        'exhibitors' => Exhibitor::class
    ];

    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $description;
    /**
     * @var
     */
    protected $image;
    /**
     * @var
     */
    protected $owner_id;
    /**
     * @var
     */
    protected $campaign_id;
    /**
     * @var
     */
    protected $details;
    /**
     * @var
     */
    protected $settings;
    /**
     * @var
     */
    protected $source;
    /**
     * @var
     */
    protected $source_id;
    /**
     * @var
     */
    protected $active;
    /**
     * @var array
     */
    protected $customers = [];
    /**
     * @var array
     */
    protected $badges = [];
    /**
     * @var array
     */
    protected $exhibitors = [];
    /**
     * @var
     */
    protected $owner;

    /**
     * @param mixed $image
     *
     * @throws ErrorException
     */
    public function setImage($image)
    {
        if (!is_resource($image)) {
            $image = @fopen($image, 'r');
        }

        if (!$image) {
            throw new ErrorException('Cannot load image');
        }

        $this->image = $image;
    }

    /**
     * @return array
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param array $badges
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return array
     */
    public function getExhibitors()
    {
        return $this->exhibitors;
    }

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param mixed $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
    }

    /**
     * @return mixed
     */
    public function getCampaignId()
    {
        return $this->campaign_id;
    }

    /**
     * @param mixed $campaign_id
     */
    public function setCampaignId($campaign_id)
    {
        $this->campaign_id = $campaign_id;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param array $details
     */
    public function setDetails(array $details)
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param array $settings
     */
    public function setSetting(array $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * @param mixed $source_id
     */
    public function setSourceId($source_id)
    {
        $this->source_id = $source_id;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return array
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param Customer|Exhibitor\Customer $customers
     */
    public function addCustomer(Exhibitor\Customer $customers)
    {
        $this->customers[] = $customers;
    }
}
