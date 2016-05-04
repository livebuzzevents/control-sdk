<?php namespace Buzz\Control\Objects;

use Buzz\Control\Collection;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Traits\HasMatchId;
use Buzz\Control\Objects\Traits\HasSource;

/**
 * Class Lead
 *
 * @package Buzz\Contract\Objects
 */
class Lead extends Object
{
    use HasMatchId, HasSource;

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
     * @var \Buzz\Control\Objects\Lead\Phone[]
     */
    protected $phones;

    /**
     * @var \Buzz\Control\Objects\Lead\Job[]
     */
    protected $jobs;

    /**
     * @var \Buzz\Control\Objects\Lead\Address[]
     */
    protected $addresses;

    /**
     * @var \Buzz\Control\Objects\Lead\Social[]
     */
    protected $socials;

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
     * @param Lead\Job $job
     */
    public function addJob(Lead\Job $job)
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
     * @param Lead\Job[]|Collection $jobs
     */
    public function setJobs($jobs)
    {
        $this->jobs = new Collection($jobs);
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
    public function setPhones($phones)
    {
        $this->phones = new Collection($phones);
    }
}
