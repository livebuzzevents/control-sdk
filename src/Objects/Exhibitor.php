<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor\PressRelease;
use Buzz\Control\Objects\Exhibitor\Tag;
use Buzz\Control\Objects\Traits\HasAnswersCommon;
use Buzz\Control\Objects\Traits\HasIdentifier;
use Buzz\Control\Objects\Traits\HasLinks;
use Buzz\Control\Objects\Traits\HasMatchId;
use Buzz\Control\Objects\Traits\HasPropertiesCommon;
use Buzz\Control\Objects\Traits\HasSource;
use Buzz\Control\Objects\Traits\HasStatus;

/**
 * Class Exhibitor
 *
 * @package Buzz\Control\Objects
 */
class Exhibitor extends Base
{
    use HasIdentifier, HasMatchId, HasSource, HasStatus, HasAnswersCommon, HasPropertiesCommon, HasLinks;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $publish;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $owner_id;

    /**
     * @var array
     */
    protected $details;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @var array
     */
    protected $stands;

    /**
     * @var string
     */
    protected $active;

    /**
     * @var string
     */
    protected $is_a_clone;

    /**
     * @var string
     */
    protected $cloned_exhibitor_id;

    /**
     * @var \Buzz\Control\Objects\Customer[]
     */
    protected $customers;

    /**
     * @var \Buzz\Control\Objects\Exhibitor[]
     */
    protected $exhibitors;

    /**
     * @var \Buzz\Control\Objects\Exhibitor
     */
    protected $owner;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\Address[]
     */
    protected $addresses;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\Phone[]
     */
    protected $phones;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\Answer[]
     */
    protected $answers;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\PressRelease[]
     */
    protected $press_releases;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\Property[]
     */
    protected $properties;

    /**
     * @var \Buzz\Control\Objects\Product[]
     */
    protected $products;

    /**
     * @var \Buzz\Control\Objects\Exhibitor
     */
    protected $cloned_exhibitor;

    /**
     * @var \Buzz\Control\Objects\File[]
     */
    protected $files;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\Tag[]
     */
    protected $tags;

    /**
     * @var \Buzz\Control\Objects\Link[]
     */
    protected $videos;

    public function __construct($data = null)
    {
        parent::__construct($data);

        $this->videos = $this->getVideos();
    }

    /**
     * @return array
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param Exhibitor\Address[]|Collection $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = new Collection($addresses);
    }

    /**
     * @param Exhibitor\Address $address
     *
     * @return array
     */
    public function addAddress(Exhibitor\Address $address)
    {
        $this->add($this->addresses, $address);
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param Exhibitor\Phone[]|Collection $phones
     */
    public function setPhones($phones)
    {
        $this->phones = new Collection($phones);
    }

    /**
     * @param Exhibitor\Phone $phone
     *
     * @return array
     */
    public function addPhone(Exhibitor\Phone $phone)
    {
        $this->add($this->phones, $phone);
    }

    /**
     * @param Exhibitor\Answer $answer
     *
     * @return array
     */
    public function addAnswer(Exhibitor\Answer $answer)
    {
        $this->add($this->answers, $answer);
    }

    /**
     * @param Exhibitor\Property[]|Collection $properties
     */
    public function setProperties($properties)
    {
        $this->properties = new Collection($properties);
    }

    /**
     * @param Exhibitor\Property $property
     *
     * @return array
     */
    public function addProperty(Exhibitor\Property $property)
    {
        $this->add($this->properties, $property);
    }

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
     * @param Exhibitor[]|Collection $exhibitors
     */
    public function setExhibitors($exhibitors)
    {
        $this->exhibitors = new Collection($exhibitors);
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
    public function getPublish()
    {
        return $this->publish;
    }

    /**
     * @param mixed $publish
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;
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
     * @return string
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param string $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
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
    public function getStands()
    {
        return $this->stands;
    }

    /**
     * @param array $stands
     */
    public function setStands(array $stands)
    {
        $this->stands = $stands;
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
     * @return PressRelease[]
     */
    public function getPressReleases()
    {
        return $this->press_releases;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Customer[]|Collection $customers
     */
    public function setCustomers($customers)
    {
        $this->customers = new Collection($customers);
    }

    /**
     * @param Customer|Exhibitor\Customer $customer
     */
    public function addCustomer(Exhibitor\Customer $customer)
    {
        $this->add($this->customers, $customer);
    }

    /**
     * @param Exhibitor\Answer[]|Collection $answers
     */
    public function setAnswers($answers)
    {
        $this->answers = new Collection($answers);
    }

    /**
     * @return Exhibitor
     */
    public function getClonedExhibitor()
    {
        return $this->cloned_exhibitor;
    }

    /**
     * @param Exhibitor $cloned_exhibitor
     */
    public function setClonedExhibitor(Exhibitor $cloned_exhibitor)
    {
        $this->cloned_exhibitor = $cloned_exhibitor;
    }

    /**
     * @return string
     */
    public function getClonedExhibitorId()
    {
        return $this->cloned_exhibitor_id;
    }

    /**
     * @param string $cloned_exhibitor_id
     */
    public function setClonedExhibitorId($cloned_exhibitor_id)
    {
        $this->cloned_exhibitor_id = $cloned_exhibitor_id;
    }

    /**
     * @return string
     */
    public function getIsAClone()
    {
        return $this->is_a_clone;
    }

    /**
     * @param string $is_a_clone
     */
    public function setIsAClone($is_a_clone)
    {
        $this->is_a_clone = $is_a_clone;
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

    /**
     * @return Tag[]|Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return \Buzz\Control\Objects\Link[]|Collection|null
     */
    public function getVideos()
    {
        return $this->getLinks() ? $this->getLinks()->filter(function ($link) {
            return in_array($link->type, ['youtube', 'vimeo']);
        }) : null;
    }
}
