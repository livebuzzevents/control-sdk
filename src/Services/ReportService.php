<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
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
     * @param Report $report
     * @return mixed
     * @throws ErrorException
     */
    public function get(Report $report)
    {
        if (!$report->getData()) {
            throw new ErrorException('Report data required!');
        }

        return $this->callAndCast('get', "report", $report->toArray());
    }
}
