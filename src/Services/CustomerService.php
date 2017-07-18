<?php namespace Buzz\Control\Services;

use Buzz\Control\Collection;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Customer;
use Buzz\Control\Objects\Exhibitor;
use Buzz\Control\Objects\Invite;
use Buzz\Control\Objects\Printer;

/**
 * Class CustomerService
 *
 * @package Buzz\Control\Services
 */
class CustomerService extends Service
{
    /**
     * @var
     */
    protected static $cast = Customer::class;

    /**
     * @var bool
     */
    protected $dupe_check = true;

    public function disableDupeCheck()
    {
        $this->dupe_check = false;

        return $this;
    }

    /**
     * @param array $credentials
     *
     * @return Customer
     */
    public function login(array $credentials)
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

        return $this->callAndCast('get', 'customer/login', $credentials);
    }

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function sendPasswordResetEmail(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('get', "customer/send-password-reset-email/{$customer->getId()}");
    }

    /**
     * @param string $token
     *
     * @return mixed
     */
    public function activatePasswordReset($token)
    {
        return $this->callAndCast('get', "customer/activate-password-reset/{$token}");
    }

    /**
     * @param string $provider
     * @param Customer $customer
     *
     * @return mixed
     */
    public function socialConnect($provider, Customer $customer = null)
    {
        $url = "customer/social-connect/{$provider}";

        if ($customer) {
            $url .= '/' . $customer->id;
        }

        $response = $this->call('get', $url);

        return $response['url'];
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws ErrorException
     */
    public function get(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCast('get', "customer/{$customer->getId()}");
    }

    /**
     * @param Customer $customer
     *
     * @throws ErrorException
     */
    public function delete(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $this->call('delete', "customer/{$customer->getId()}");
    }

    /**
     * @param Customer $customer
     *
     * @return Customer
     * @throws ErrorException
     */
    public function save(Customer $customer)
    {
        if ($customer->getId()) {
            $verb = 'put';
            $url  = 'customer/' . $customer->getId();
        } else {
            $verb = 'post';
            $url  = 'customer';
        }

        $data = $customer->toArray();

        if (!$this->dupe_check) {
            $data['disable_dupecheck'] = true;
            $this->dupe_check          = true;
        }

        return $this->callAndCast($verb, $url, $data);
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'customers');
    }

    /**
     * @return Customer[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'customers');
    }

    /**
     * @param Customer[] $customers
     *
     * @return Customer[]
     * @throws ErrorException
     */
    public function saveMany(array $customers)
    {
        foreach ($customers as $key => $customer) {
            $customers[$key] = $customer->toArray();
        }

        return $this->callAndCastMany('post', 'customers', ['batch' => $customers]);
    }

    /**
     * @param Customer $customer
     * @param int $count
     *
     * @return mixed
     * @throws ErrorException
     */
    public function suggestExhibitors(Customer $customer, $count = 15)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        $exhibitors = $this->call('get', "customer/{$customer->getId()}/suggest-exhibitors/{$count}");

        return $this->castMany($exhibitors, Exhibitor::class);
    }

    /**
     * @param Customer $customer
     *
     * @return mixed
     * @throws ErrorException
     */
    public function suggestConnections(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return new Collection($this->call('get', "customer/{$customer->getId()}/suggest-connections"));
    }

    /**
     * @param Customer $customer
     *
     * @return mixed
     * @throws ErrorException
     */
    public function getEmailInvites(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->castMany($this->call('get', "customer/{$customer->getId()}/email-invites"), Invite::class);
    }

    /**
     * @param Customer $customer
     * @param Invite $invite
     *
     * @return mixed
     * @throws ErrorException
     */
    public function attachInvite(Customer $customer, Invite $invite)
    {
        if (!$customer->getId() || !$invite->getId()) {
            throw new ErrorException('Customer id and Invite id required!');
        }

        $exhibitors = $this->call('get', "customer/{$customer->getId()}/invite/{$invite->getId()}/attach");

        return $this->castMany($exhibitors, Exhibitor::class);
    }

    /**
     * @param Customer $customer
     *
     * @return Collection
     * @throws ErrorException
     */
    public function detachInvite(Customer $customer, Invite $invite)
    {
        if (!$customer->getId() || !$invite->getId()) {
            throw new ErrorException('Customer id and Invite id required!');
        }

        return new Collection($this->call('get', "customer/{$customer->getId()}/invite/{$invite->getId()}/detach"));
    }

    /**
     * @param Customer $customer
     * @param string $tag
     *
     * @return Customer
     * @throws ErrorException
     */
    public function tag(Customer $customer, $tag)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$tag) {
            throw new ErrorException('Tag is required!');
        }

        return $this->callAndCast('post', "customer/{$customer->getId()}/tag/{$tag}");
    }

    /**
     * @param Customer $customer
     * @param string $tag
     *
     * @return Customer
     * @throws ErrorException
     */
    public function untag(Customer $customer, $tag)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$tag) {
            throw new ErrorException('Tag is required!');
        }

        return $this->callAndCast('delete', "customer/{$customer->getId()}/tag/{$tag}");
    }

    /**
     * @param Customer $customer
     * @param array $tags
     *
     * @return Customer
     * @throws ErrorException*
     */
    public function syncTags(Customer $customer, array $tags = [])
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->callAndCast('post', "customer/{$customer->getId()}/tags", compact('tags'));
    }

    /**
     * @param Customer $customer
     *
     * @return mixed
     * @throws ErrorException
     */
    public function viewedBadge(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->call('post', "customer/{$customer->getId()}/viewed");
    }

    /**
     * @param Customer $customer
     * @param int $width
     * @param int $height
     *
     * @return string
     * @throws ErrorException
     */
    public function getBarcodeImage(Customer $customer, $width = 1, $height = 30)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->call('get', "customer/{$customer->getId()}/barcode-image", compact('width', 'height'))['image'];
    }

    /**
     * @param Customer $customer
     * @param int $size
     *
     * @return string
     * @throws ErrorException
     */
    public function getQrCodeImage(Customer $customer, $size = 125)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->call('get', "customer/{$customer->getId()}/qrcode-image", compact('size'))['image'];
    }

    /**
     * @param Customer $customer
     *
     * @return string
     * @throws ErrorException
     */
    public function getEBadge(Customer $customer)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        header('Content-Type: application/pdf');
        header('Content-disposition: inline; filename="badge.pdf"');
        header('Cache-Control: public, must-revalidate, max-age=0');
        header('Pragma: public');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');

        echo base64_decode($this->call('get', "customer/{$customer->getId()}/e-badge")['e-badge']);

        return '';
    }

    /**
     * @param Customer $customer
     * @param array $badgeStockConfiguration
     *
     * @return Customer
     * @throws ErrorException
     */
    public function smartPrint(Customer $customer, array $badgeStockConfiguration)
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        return $this->cast(
            $this->call('post', "customer/{$customer->getId()}/smart-print", compact('badgeStockConfiguration')),
            Printer::class
        );
    }

    /**
     * @param Customer $customer
     * @param Printer $printer
     * @param array $options
     *
     * @return Customer
     * @throws ErrorException
     */
    public function printBadge(Customer $customer, Printer $printer, array $options = [])
    {
        if (!$customer->getId()) {
            throw new ErrorException('Customer id required!');
        }

        if (!$printer->getId()) {
            throw new ErrorException('Printer id required!');
        }

        return $this->call('post', "customer/{$customer->getId()}/print/{$printer->getId()}", $options);
    }

    /**
     * @param Printer $printer
     * @param array $options
     *
     * @return Customer
     * @throws ErrorException
     */
    public function printSeparator(Printer $printer, array $options = [])
    {
        if (!$printer->getId()) {
            throw new ErrorException('Printer id required!');
        }

        return $this->call('post', "customer/print-separator/{$printer->getId()}", $options);
    }

    /**
     * @param Customer $customer
     *
     * @return array|false
     * @throws ErrorException
     */
    public function dupeCheck(Customer $customer)
    {
        $verb = 'post';
        $url  = 'customer/dupe-check';

        try {
            $this->call($verb, $url, $customer->toArray());
        } catch (ErrorException $e) {
            return explode(', ', str_replace('Duped on: ', '', $e->getError()));
        }

        return false;
    }

    /**
     * @param Campaign $campaign
     * @param Customer $customer
     *
     * @return mixed
     * @throws ErrorException
     */
    public function clone(Campaign $campaign, Customer $customer)
    {
        if (!$campaign->getId() && $campaign->getIdentifier()) {
            throw new ErrorException('Campaign id or identifier required!');
        }

        if (!$customer->getId()) {
            throw new ErrorException('Custoemr id required!');
        }

        return $this->cast(
            $this->call('get', "customer/clone/" . ($campaign->id ?? $campaign->identifier) . "/{$customer->getId()}"),
            Customer::class
        );
    }
}
