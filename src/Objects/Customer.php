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
    protected $group;

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
            throw new ErrorException('Invalid sex value');
        }

        $this->sex = $sex;
    }

    /**
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;
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
            throw new ErrorException('Invalid email address!');
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
            throw new ErrorException('Nationality must be in ISO 3166 format');
        }

        $this->nationality = $nationality;
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
            throw new ErrorException('Language must be in ISO 639 format');
        }

        $this->language = $language;
    }
}
