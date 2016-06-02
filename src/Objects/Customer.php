<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasAnswersCommon;
use Buzz\Control\Objects\Traits\HasBadges;
use Buzz\Control\Objects\Traits\HasCreatedBadges;
use Buzz\Control\Objects\Traits\HasMatchId;
use Buzz\Control\Objects\Traits\HasPivot;
use Buzz\Control\Objects\Traits\HasPropertiesCommon;
use Buzz\Control\Objects\Traits\HasSource;
use Buzz\Control\Objects\Traits\HasStatus;

/**
 * Class Customer
 *
 * @package Buzz\Contract\Objects
 */
class Customer extends Object
{
    use BelongsToCampaign, HasMatchId, HasSource, HasStatus, HasAnswersCommon, HasPropertiesCommon, HasPivot, HasBadges, HasCreatedBadges;

    /**
     * @var string
     */
    protected $owner_id;

    /**
     * @var \Buzz\Control\Objects\Customer
     */
    protected $owner;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var bool
     */
    protected $has_password;

    /**
     * @var string
     */
    protected $remember_token;

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
    protected $name;

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
     * @var \Buzz\Control\Objects\Customer\Phone[]
     */
    protected $phones;

    /**
     * @var \Buzz\Control\Objects\Customer\Job[]
     */
    protected $jobs;

    /**
     * @var \Buzz\Control\Objects\Customer\Address[]
     */
    protected $addresses;

    /**
     * @var \Buzz\Control\Objects\Customer\Property[]
     */
    protected $properties;

    /**
     * @var \Buzz\Control\Objects\Customer\Social[]
     */
    protected $socials;

    /**
     * @var \Buzz\Control\Objects\Customer\Affiliate[]
     */
    protected $affiliates;

    /**
     * @var \Buzz\Control\Objects\Customer\Answer[]
     */
    protected $answers;

    /**
     * @var \Buzz\Control\Objects\Customer\Flow
     */
    protected $flow;

    /**
     * @var \Buzz\Control\Objects\Customer\Flow[]
     */
    protected $flows;

    /**
     * @var \Buzz\Control\Objects\Exhibitor[]
     */
    protected $exhibitors;

    /**
     * @var \Buzz\Control\Objects\Invite[]
     */
    protected $invites;

    /**
     * @var \Buzz\Control\Objects\Customer\Lead[]
     */
    protected $leads;

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
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return boolean
     */
    public function getHasPassword()
    {
        return $this->has_password;
    }

    /**
     * @return mixed
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * @param mixed $remember_token
     */
    public function setRememberToken($remember_token)
    {
        $this->remember_token = $remember_token;
    }

    /**
     * @param Customer\Answer $answer
     */
    public function addAnswer(Customer\Answer $answer)
    {
        $this->add($this->answers, $answer);
    }

    /**
     * @return mixed
     */
    public function getSocials()
    {
        return $this->socials;
    }

    /**
     * @param Customer\Social[]|Collection $socials
     */
    public function setSocials($socials)
    {
        $this->socials = new Collection($socials);
    }

    /**
     * @param Customer\Social $social
     */
    public function addSocial(Customer\Social $social)
    {
        $this->add($this->socials, $social);
    }

    /**
     * @return mixed
     */
    public function getAffiliates()
    {
        return $this->affiliates;
    }

    /**
     * @param Customer\Affiliate[]|Collection $affiliates
     */
    public function setAffiliates($affiliates)
    {
        $this->affiliates = new Collection($affiliates);
    }

    /**
     * @param Customer\Affiliate $affiliate
     */
    public function addAffiliate(Customer\Affiliate $affiliate)
    {
        $this->add($this->affiliates, $affiliate);
    }

    /**
     * @param Customer\Property[]|Collection $properties
     */
    public function setProperties($properties)
    {
        $this->properties = new Collection($properties);
    }

    /**
     * @param Customer\Property $property
     */
    public function addProperty(Customer\Property $property)
    {
        $this->add($this->properties, $property);
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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
     * @param Customer\Address $address
     */
    public function addAddress(Customer\Address $address)
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
     * @param Customer\Address[]|Collection $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = new Collection($addresses);
    }

    /**
     * @param Customer\Job $job
     */
    public function addJob(Customer\Job $job)
    {
        $this->add($this->jobs, $job);
    }

    /**
     * @return mixed
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @param Customer\Job[]|Collection $jobs
     */
    public function setJobs($jobs)
    {
        $this->jobs = new Collection($jobs);
    }

    /**
     * @param Customer\Phone $phone
     */
    public function addPhone(Customer\Phone $phone)
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
     * @param Customer\Phone[]|Collection $phones
     */
    public function setPhones($phones)
    {
        $this->phones = new Collection($phones);
    }

    /**
     * @return Customer\Flow
     */
    public function getFlow()
    {
        return $this->flow;
    }

    /**
     * @param Customer\Flow $flow
     */
    public function addFlow(Customer\Flow $flow)
    {
        $this->add($this->flows, $flow);
    }

    /**
     * @return mixed
     */
    public function getFlows()
    {
        return $this->flows;
    }

    /**
     * @param Customer\Flow[]|Collection $flows
     */
    public function setFlows($flows)
    {
        $this->flows = new Collection($flows);
    }

    /**
     * @param Customer\Answer[]|Collection $answers
     */
    public function setAnswers($answers)
    {
        $this->answers = new Collection($answers);
    }

    /**
     * @return mixed
     */
    public function getExhibitors()
    {
        return $this->exhibitors;
    }

    /**
     * @return mixed
     */
    public function getInvites()
    {
        return $this->invites;
    }

    /**
     * @param Customer\Lead $lead
     */
    public function addLead(Customer\Lead $lead)
    {
        $this->add($this->leads, $lead);
    }

    /**
     * @return Customer\Lead[]
     */
    public function getLeads()
    {
        return $this->leads;
    }

    /**
     * @param Customer\Lead[] $leads
     */
    public function setLeads(array $leads)
    {
        $this->leads = new Collection($leads);
    }
}
