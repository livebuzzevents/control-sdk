<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;
use Buzz\Control\Objects\Printer;

/**
 * Class BadgeService
 *
 * @package Buzz\Control\Services
 */
class BadgeService extends Service
{
    /**
     * @var
     */
    protected static $cast = Badge::class;

    /**
     * @param Badge $badge
     *
     * @return Badge
     * @throws ErrorException
     */
    public function get(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->callAndCast('get', "badge/{$badge->getId()}");
    }

    /**
     * @param Badge $badge
     * @param array $badgeStockConfiguration
     *
     * @return Badge
     * @throws ErrorException
     */
    public function smartPrint(Badge $badge, array $badgeStockConfiguration)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->cast(
            $this->call('post', "badge/{$badge->getId()}/smart-print", compact('badgeStockConfiguration')),
            Printer::class
        );
    }

    /**
     * @param Badge   $badge
     * @param Printer $printer
     * @param array   $options
     *
     * @return Badge
     * @throws ErrorException
     */
    public function print(Badge $badge, Printer $printer, array $options = [])
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        if (!$printer->getId()) {
            throw new ErrorException('Printer id required!');
        }

        return $this->call('post', "badge/{$badge->getId()}/print/{$printer->getId()}", $options);
    }

    /**
     * @param Printer $printer
     * @param array   $options
     *
     * @return Badge
     * @throws ErrorException
     */
    public function printSeparator(Printer $printer, array $options = [])
    {
        if (!$printer->getId()) {
            throw new ErrorException('Printer id required!');
        }

        return $this->call('post', "badge/print-separator/{$printer->getId()}", $options);
    }

    /**
     * @param Badge $badge
     *
     * @throws ErrorException
     */
    public function delete(Badge $badge)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        $this->call('delete', "badge/{$badge->getId()}");
    }

    /**
     * @param Badge $badge
     *
     * @return Badge
     * @throws ErrorException
     */
    public function save(Badge $badge)
    {
        if (!$badge->getId() && !$badge->getCampaignId() && !$badge->getCampaign()) {
            throw new ErrorException('Badge id or Campaign id/identifier required!');
        }

        if ($badge->getId()) {
            $verb = 'put';
            $url  = 'badge/' . $badge->getId();
        } else {
            $verb = 'post';
            $url  = 'badge';
        }

        return $this->callAndCast($verb, $url, $badge->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'badges');
    }

    /**
     * @return Badge[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'badges');
    }

    /**
     * @param Badge[] $badges
     *
     * @return Badge[]
     * @throws ErrorException
     */
    public function saveMany(array $badges)
    {
        foreach ($badges as $key => $badge) {
            if (!$badge->getId() && !$badge->getCampaignId() && !$badge->getCampaign()) {
                throw new ErrorException('Badge id or Campaign id/identifier required!');
            }

            $badges[$key] = $badge->toArray();
        }

        return $this->callAndCastMany('post', 'badges', ['batch' => $badges]);
    }

    /**
     * @param Badge $badge
     * @param int   $width
     * @param int   $height
     *
     * @return string
     * @throws ErrorException
     */
    public function getBarcodeImage(Badge $badge, $width = 1, $height = 30)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->call('get', "badge/{$badge->getId()}/barcode-image", compact('width', 'height'))['image'];
    }

    /**
     * @param Badge $badge
     * @param int   $size
     *
     * @return string
     * @throws ErrorException
     */
    public function getQrCodeImage(Badge $badge, $size = 125)
    {
        if (!$badge->getId()) {
            throw new ErrorException('Badge id required!');
        }

        return $this->call('get', "badge/{$badge->getId()}/qrcode-image", compact('size'))['image'];
    }
}