<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Lead\Tag;
use Buzz\Control\Objects\Traits\HasMatchId;
use Buzz\Control\Objects\Traits\HasPropertiesCommon;
use Buzz\Control\Objects\Traits\HasSource;

/**
 * Class Lead
 *
 * @package Buzz\Contract\Objects
 */
class Lead extends Base
{
    use HasMatchId, HasSource, HasPropertiesCommon;

    /**
     * @var string
     */
    protected $avatar;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $first_name;

    /**
     * @var string
     */
    protected $middle_name;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var string
     */
    protected $job_title;

    /**
     * @var string
     */
    protected $company;

    /**
     * @var string
     */
    protected $sex;

    /**
     * @var string
     */
    protected $nationality;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $is_a_clone;

    /**
     * @var string
     */
    protected $cloned_customer_id;

    /**
     * @var string
     */
    protected $cloned_lead_id;

    /**
     * @var \Buzz\Control\Objects\Lead\Phone[]
     */
    protected $phones;

    /**
     * @var \Buzz\Control\Objects\Lead\Address[]
     */
    protected $addresses;

    /**
     * @var \Buzz\Control\Objects\Lead\Property[]
     */
    protected $properties;

    /**
     * @var \Buzz\Control\Objects\Lead\Social[]
     */
    protected $socials;

    /**
     * @var \Buzz\Control\Objects\Customer\Lead[]
     */
    protected $customers;

    /**
     * @var \Buzz\Control\Objects\LeadGroup
     */
    protected $group;

    /**
     * @var \Buzz\Control\Objects\Customer
     */
    protected $cloned_customer;

    /**
     * @var \Buzz\Control\Objects\Lead
     */
    protected $cloned_lead;

    /**
     * @var \Buzz\Control\Objects\EmailMessage[]
     */
    protected $email_messages;

    /**
     * @var \Buzz\Control\Objects\Lead\Tag[]
     */
    protected $tags;

    /**
     * @return mixed
     */
    public function getSocials()
    {
        return $this->socials;
    }

    /**
     * @param Lead\Social[]|Collection $socials
     */
    public function setSocials($socials)
    {
        $this->socials = new Collection($socials);
    }

    /**
     * @param Lead\Social $social
     */
    public function addSocial(Lead\Social $social)
    {
        $this->add($this->socials, $social);
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * @param mixed $middle_name
     */
    public function setMiddleName($middle_name)
    {
        $this->middle_name = $middle_name;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param $sex
     *
     * @throws ErrorException
     */
    public function setSex($sex)
    {
        if (!in_array($sex, ['male', 'female', 'other'])) {
            throw new ErrorException("Invalid sex value '{$sex}'");
        }

        $this->sex = $sex;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     *
     * @throws ErrorException
     */
    public function setEmail($email)
    {
        if ($email && filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new ErrorException("Invalid email address '{$email}'!");
        }

        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getJobTitle()
    {
        return $this->job_title;
    }

    /**
     * @param string $job_title
     */
    public function setJobTitle($job_title)
    {
        $this->job_title = $job_title;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param $nationality
     *
     * @throws ErrorException
     */
    public function setNationality($nationality)
    {
        if (strlen($nationality) !== 2) {
            throw new ErrorException("Nationality must be in ISO 3166 format '{$nationality}'");
        }

        $this->nationality = mb_strtoupper($nationality);
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param $language
     *
     * @throws ErrorException
     */
    public function setLanguage($language)
    {
        if (strlen($language) !== 2) {
            throw new ErrorException("Language must be in ISO 639 format '{$language}'");
        }

        $this->language = mb_strtolower($language);
    }

    /**
     * @param Lead\Address $address
     */
    public function addAddress(Lead\Address $address)
    {
        $this->add($this->addresses, $address);
    }

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param Lead\Address[]|Collection $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = new Collection($addresses);
    }

    /**
     * @param Lead\Phone $phone
     */
    public function addPhone(Lead\Phone $phone)
    {
        $this->add($this->phones, $phone);
    }

    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param Lead\Phone[]|Collection $phones
     */
    public function setPhones(array $phones)
    {
        $this->phones = new Collection($phones);
    }

    /**
     * @param Customer\Lead $customer
     */
    public function addCustomer(Customer\Lead $customer)
    {
        $this->add($this->customers, $customer);
    }

    /**
     * @return Customer\Lead[]
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param Customer\Lead[] $customers
     */
    public function setCustomers(array $customers)
    {
        $this->customers = $customers;
    }

    /**
     * @return LeadGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param LeadGroup $group
     */
    public function setGroup(LeadGroup $group)
    {
        $this->group = $group;
    }

    /**
     * @return Customer
     */
    public function getClonedCustomer()
    {
        return $this->cloned_customer;
    }

    /**
     * @param Customer $cloned_customer
     */
    public function setClonedCustomer(Customer $cloned_customer)
    {
        $this->cloned_customer = $cloned_customer;
    }

    /**
     * @return string
     */
    public function getClonedCustomerId()
    {
        return $this->cloned_customer_id;
    }

    /**
     * @param string $cloned_customer_id
     */
    public function setClonedCustomerId($cloned_customer_id)
    {
        $this->cloned_customer_id = $cloned_customer_id;
    }

    /**
     * @return Lead
     */
    public function getClonedLead()
    {
        return $this->cloned_lead;
    }

    /**
     * @param Lead $cloned_lead
     */
    public function setClonedLead(Lead $cloned_lead)
    {
        $this->cloned_lead = $cloned_lead;
    }

    /**
     * @return string
     */
    public function getClonedLeadId()
    {
        return $this->cloned_lead_id;
    }

    /**
     * @param string $cloned_lead_id
     */
    public function setClonedLeadId($cloned_lead_id)
    {
        $this->cloned_lead_id = $cloned_lead_id;
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
    public function getEmailMessages()
    {
        return $this->email_messages;
    }

    /**
     * @return Tag[]|Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Lead\Property[]|Collection $properties
     */
    public function setProperties($properties)
    {
        $this->properties = new Collection($properties);
    }

    /**
     * @param Lead\Property $property
     */
    public function addProperty(Lead\Property $property)
    {
        $this->add($this->properties, $property);
    }
}
