<?php namespace Buzz\Control\Objects;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Traits\BelongsToCampaign;
use Buzz\Control\Objects\Traits\HasAnswersCommon;
use Buzz\Control\Objects\Traits\HasSharedId;
use Buzz\Control\Objects\Traits\HasSource;
use Buzz\Control\Objects\Traits\HasStatus;

/**
 * Class Customer
 *
 * @package Buzz\Contract\Objects
 */
class Customer extends Object
{
    use BelongsToCampaign, HasSharedId, HasSource, HasStatus, HasAnswersCommon;

    /**
     * @var int
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
     * @var string
     */
    protected $remember_token;
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
     * @var \Buzz\Control\Objects\Customer\Answer[]
     */
    protected $answers;
    /**
     * @var \Buzz\Control\Objects\Badge[]
     */
    protected $badges;

    /**
     * @return int
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param int $owner_id
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
     * @return array
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param Customer\Answer $answer
     */
    public function addAnswer(Customer\Answer $answer)
    {
        $this->answers[] = $answer;
    }

    /**
     * @return mixed
     */
    public function getSocials()
    {
        return $this->socials;
    }

    /**
     * @param Customer\Social $social
     */
    public function addSocial(Customer\Social $social)
    {
        $this->socials[] = $social;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param Customer\Property $property
     */
    public function addProperty(Customer\Property $property)
    {
        $this->properties[] = $property;
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
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
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
        $this->addresses[] = $address;
    }

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param Customer\Job $job
     */
    public function addJob(Customer\Job $job)
    {
        $this->jobs[] = $job;
    }

    /**
     * @return mixed
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @param Customer\Phone $phone
     */
    public function addPhone(Customer\Phone $phone)
    {
        $this->phones[] = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }
}
