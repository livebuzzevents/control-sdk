<?php namespace Buzz\Control\Objects;

use Buzz\Control\Exceptions\ErrorException;

/**
 * Class Customer
 *
 * @package Buzz\Contract\Objects
 */
class Customer extends Object
{
    /**
     * @var
     */
    protected $email;

    /**
     * @var
     */
    protected $title;

    /**
     * @var
     */
    protected $first_name;

    /**
     * @var
     */
    protected $middle_name;

    /**
     * @var
     */
    protected $last_name;

    /**
     * @var
     */
    protected $sex;

    /**
     * @var
     */
    protected $nationality;

    /**
     * @var
     */
    protected $language;

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
    protected $phones;

    /**
     * @var
     */
    protected $jobs;

    /**
     * @var
     */
    protected $addresses;
    /**
     * @var
     */
    protected $campaign_id;

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
