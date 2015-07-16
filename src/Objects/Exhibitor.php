<?php namespace Buzz\Control\Objects;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasAnswersCommon;
use Buzz\Control\Objects\Traits\HasSharedId;
use Buzz\Control\Objects\Traits\HasSource;
use Buzz\Control\Objects\Traits\HasStatus;

/**
 * Class Exhibitor
 *
 * @package Buzz\Control\Objects
 */
class Exhibitor extends Object
{
    use BelongsToCampaign, HasSharedId, HasSource, HasStatus, HasAnswersCommon;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var int
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
     * @var string
     */
    protected $active;

    /**
     * @var \Buzz\Control\Objects\Customer[]
     */
    protected $customers;

    /**
     * @var \Buzz\Control\Objects\Badge[]
     */
    protected $badges;

    /**
     * @var \Buzz\Control\Objects\Badge[]
     */
    protected $created_badges;

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
     * @var \Buzz\Control\Objects\Exhibitor\Property[]
     */
    protected $properties;

    /**
     * @var \Buzz\Control\Objects\Exhibitor\Social[]
     */
    protected $socials;

    /**
     * @return array
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param Exhibitor\Address[] $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @param Exhibitor\Address $address
     *
     * @return array
     */
    public function addAddress(Exhibitor\Address $address)
    {
        $this->addresses[] = $address;
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param Exhibitor\Phone[] $phones
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

    /**
     * @param Exhibitor\Phone $phone
     *
     * @return array
     */
    public function addPhone(Exhibitor\Phone $phone)
    {
        $this->phones[] = $phone;
    }

    /**
     * @param Exhibitor\Answer $answer
     *
     * @return array
     */
    public function addAnswer(Exhibitor\Answer $answer)
    {
        $this->answers[] = $answer;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param Exhibitor\Property[] $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @param Exhibitor\Property $property
     *
     * @return array
     */
    public function addProperty(Exhibitor\Property $property)
    {
        $this->properties[] = $property;
    }

    /**
     * @return array
     */
    public function getSocials()
    {
        return $this->socials;
    }

    /**
     * @param Exhibitor\Social[] $socials
     */
    public function setSocials($socials)
    {
        $this->socials = $socials;
    }

    /**
     * @param Exhibitor\Social $social
     *
     * @return array
     */
    public function addSocial(Exhibitor\Social $social)
    {
        $this->socials[] = $social;
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
     * @param Exhibitor[] $exhibitors
     */
    public function setExhibitors($exhibitors)
    {
        $this->exhibitors = $exhibitors;
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
     * @param Customer[] $customers
     */
    public function setCustomers($customers)
    {
        $this->customers = $customers;
    }

    /**
     * @param Customer|Exhibitor\Customer $customers
     */
    public function addCustomer(Exhibitor\Customer $customers)
    {
        $this->customers[] = $customers;
    }

    /**
     * @param Badge $badge
     */
    public function addBadge(Badge $badge)
    {
        $this->badges[] = $badge;
    }

    /**
     * @return mixed
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param Badge[] $badges
     */
    public function setBadges(array $badges = [])
    {
        $this->badges = $badges;
    }

    /**
     * @param Exhibitor\Answer[] $answers
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    /**
     * @param Badge $badge
     */
    public function addCreatedBadge(Badge $badge)
    {
        $this->created_badges[] = $badge;
    }

    /**
     * @return mixed
     */
    public function getCreatedBadges()
    {
        return $this->created_badges;
    }

    /**
     * @param Badge[] $badges
     */
    public function setCreatedBadges(array $badges = [])
    {
        $this->created_badges = $badges;
    }
}
