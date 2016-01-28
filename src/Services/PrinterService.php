<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Printer;

/**
 * Class PrinterService
 *
 * @package Buzz\Control\Services
 */
class PrinterService extends Service
{
    /**
     * @var
     */
    protected static $cast = Printer::class;

    /**
     * @param Printer $printer
     *
     * @return Printer
     * @throws ErrorException
     */
    public function get(Printer $printer)
    {
        if (!$printer->getId()) {
            throw new ErrorException('Printer id required!');
        }

        return $this->callAndCast('get', "printer/{$printer->getId()}");
    }

    /**
     * @param Printer $printer
     *
     * @throws ErrorException
     */
    public function delete(Printer $printer)
    {
        if (!$printer->getId()) {
            throw new ErrorException('Printer id required!');
        }

        $this->call('delete', "printer/{$printer->getId()}");
    }

    /**
     * @param Printer $printer
     *
     * @return Printer
     * @throws ErrorException
     */
    public function save(Printer $printer)
    {
        if (!$printer->getId() && !$printer->getCampaignId() && !$printer->getCampaign()) {
            throw new ErrorException('Printer id or Campaign id/identifier required!');
        }

        if ($printer->getId()) {
            $verb = 'put';
            $url  = 'printer/' . $printer->getId();
        } else {
            $verb = 'post';
            $url  = 'printer';
        }

        return $this->callAndCast($verb, $url, $printer->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'printers');
    }

    /**
     * @return Printer[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'printers');
    }

    /**
     * @param Printer[] $printers
     *
     * @return Printer[]
     * @throws ErrorException
     */
    public function saveMany(array $printers)
    {
        foreach ($printers as $key => $printer) {
            if (!$printer->getId() && !$printer->getBadgeStockId()) {
                throw new ErrorException('Printer id or Campaign id/identifier required!');
            }

            $printers[$key] = $printer->toArray();
        }

        return $this->callAndCastMany('post', 'printers', ['batch' => $printers]);
    }
}