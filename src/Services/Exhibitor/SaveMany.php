<?php namespace Buzz\Control\Services\Exhibitor;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Exhibitor;

class SaveMany implements Service
{
    /**
     * @var Exhibitor[]
     */
    private $exhibitors;

    /**
     * @param Exhibitor[] $exhibitors
     *
     * @throws ErrorException
     */
    public function __construct(array $exhibitors)
    {
        foreach ($exhibitors as $exhibitor) {
            if (!$exhibitor->getId() && !$exhibitor->getCampaignId()) {
                throw new ErrorException('Exhibitor id or Campaign id required!');
            }
        }

        $this->exhibitors = $exhibitors;
    }

    /**
     * Gets the HTTP verb of the api call
     *
     * @return mixed
     */
    public function getMethod()
    {
        return 'post';
    }

    /**
     * Gets the url endpoint for the api call
     *
     * @return mixed
     */
    public function getUrl()
    {
        return "exhibitors";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        $exhibitors = [];

        foreach ($this->exhibitors as $exhibitor) {
            $exhibitors[] = $exhibitor->toArray();
        }

        return ['batch' => $exhibitors];
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $key => $exhibitor) {
            $decorated[$key] = Exhibitor::createFromArray($exhibitor);
        }

        return $decorated;
    }
}