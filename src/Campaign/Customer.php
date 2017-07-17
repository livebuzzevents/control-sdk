<?php

namespace Buzz\Control;

use JTDSoft\EssentialsSdk\Core\Object;

/**
 * Class Customer
 *
 * @property string    $id
 * @property string    $username
 * @property string    $password
 * @property bool      $has_password
 * @property string    $remember_token
 * @property string    $avatar
 * @property string    $email
 * @property string    $title
 * @property string    $first_name
 * @property string    $middle_name
 * @property string    $last_name
 * @property string    $job_title
 * @property string    $company
 * @property string    $name
 * @property string    $sex
 * @property string    $nationality
 * @property string    $language
 * @property \DateTime $updated_at
 * @property \DateTime $created_at
 *
 * @package Identity\Contract\Objects
 */
class Customer extends Object
{
    /**
     * @param string $id
     * @param array  $expand
     *
     * @return Customer
     */
    public static function find(string $id, array $expand = [])
    {
        return (new Service())->callAndCast(self::class, 'get', "customers/{$id}", compact('expand'));
    }

    public static function get(array $expand = [], array $options = [])
    {
        return (new Service())->callAndCast(self::class, 'get', "customers", compact('expand', 'options'));
    }

    public static function first(array $expand = [], array $options = [])
    {
        return self::get($expand, $options)->first();
    }

    public static function saveMany($customers, array $expand = [])
    {
        return (new Service())->callAndCast(self::class, 'post', "customers", $customers + compact('expand'));
    }

    public static function deleteMany(array $options = [])
    {
        return (new Service())->call('delete', "customers", compact('options'));
    }

    public static function create(array $attributes)
    {
        $customer = (new self($attributes));

        $customer->save();

        return $customer;
    }

    public function save()
    {
        if ($this->id) {
            $this->copyFromArray(
                (new Service())->call('put', "customers/{$this->id}", $this->data + compact('expand'))
            );
        } else {
            $this->copyFromArray(
                (new Service())->call('post', "customers", $this->data + compact('expand'))
            );
        }
    }

    public function delete()
    {
        return (new Service())->call('delete', "customers/{$this->id}");
    }

    public static function login(array $credentials)
    {
        $user_information = [
            'user_agent'      => !empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null,
            'accept_language' => !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : null,
        ];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $user_information['x_ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $user_information['ip'] = $_SERVER['REMOTE_ADDR'];
        }

        $credentials['user_information'] = $user_information;

        return (new Service())->callAndCast(self::class, 'get', "customers/login", $credentials);
    }
}
