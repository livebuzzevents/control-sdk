<?php namespace Buzz\Control\Services\Badge;

use Buzz\Control\Contracts\Service;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\Badge;

class SaveMany implements Service
{
    /**
     * @var Badge[]
     */
    private $badges;

    /**
     * @param Badge[] $badges
     *
     * @throws ErrorException
     */
    public function __construct(array $badges)
    {
        foreach ($badges as $badge) {
            if (!$badge->getId() && !$badge->getCampaignId()) {
                throw new ErrorException('Badge id or Campaign id required!');
            }
        }

        $this->badges = $badges;
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
        return "badges";
    }

    /**
     * get the request body of the api call
     *
     * @return mixed
     */
    public function getRequest()
    {
        $badges = [];

        foreach ($this->badges as $badge) {
            $badges[] = $badge->toArray();
        }

        return ['batch' => $badges];
    }

    /**
     * @param $response
     *
     * @return static
     */
    public function decorate($response)
    {
        $decorated = [];

        foreach ($response as $key => $badge) {
            $decorated[$key] = Badge::createFromArray($badge);
        }

        return $decorated;
    }
}