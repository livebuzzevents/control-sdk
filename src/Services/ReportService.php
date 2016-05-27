<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Campaign;
use Buzz\Control\Objects\Report;

/**
 * Class ReportService
 *
 * @package Buzz\Control\Services
 */
class ReportService extends Service
{
    /**
     * @var
     */
    protected static $cast = Report\Chartjs::class;

    /**
     * @param Report   $report
     * @param Campaign $campaign
     * @return mixed
     * @throws ErrorException
     */
    public function get(Report $report, Campaign $campaign)
    {
        if (!$report->getData()) {
            throw new ErrorException('Report data required!');
        }

        if (!$campaign->getId()) {
            throw new ErrorException('Campaign id required!');
        }

        return $this->callAndCast('get', "reports/{$campaign->getId()}", $report->toArray());
    }
}