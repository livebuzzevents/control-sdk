<?php namespace Buzz\Control\Objects;

use Buzz\Control\Objects\Traits\BelongsToScanner;

/**
 * Class SmartScanCode
 */
class SmartScanCode extends Base
{
    use BelongsToScanner;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $device_id;

    /**
     * @var bool
     */
    protected $used;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->device_id;
    }

    /**
     * @param string $device_id
     */
    public function setDeviceId(string $device_id)
    {
        $this->device_id = $device_id;
    }

    /**
     * @return bool
     */
    public function getUsed(): bool
    {
        return $this->used;
    }

    /**
     * @param bool $used
     */
    public function setUsed(bool $used)
    {
        $this->used = $used;
    }

    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }
}
