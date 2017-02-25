<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\CampaignSetting;

/**
 * Class CampaignSettingService
 *
 * @package Buzz\Control\Services
 */
class CampaignSettingService extends Service
{
    /**
     * @var
     */
    protected static $cast = CampaignSetting::class;

    /**
     * @param CampaignSetting $campaign_setting
     *
     * @return CampaignSetting
     * @throws ErrorException
     */
    public function get(CampaignSetting $campaign_setting)
    {
        if (!$campaign_setting->getId()) {
            throw new ErrorException('CampaignSetting id required!');
        }

        return $this->callAndCast('get', "campaign-setting/{$campaign_setting->getId()}");
    }

    /**
     * @param CampaignSetting $campaign_setting
     *
     * @throws ErrorException
     */
    public function delete(CampaignSetting $campaign_setting)
    {
        if (!$campaign_setting->getId()) {
            throw new ErrorException('CampaignSetting id required!');
        }

        $this->call('delete', "campaign-setting/{$campaign_setting->getId()}");
    }

    /**
     * @param CampaignSetting $campaign_setting
     *
     * @return CampaignSetting
     * @throws ErrorException
     */
    public function save(CampaignSetting $campaign_setting)
    {
        if ($campaign_setting->getId()) {
            $verb = 'put';
            $url  = 'campaign-setting/' . $campaign_setting->getId();
        } else {
            $verb = 'post';
            $url  = 'campaign-setting';
        }

        return $this->callAndCast($verb, $url, $campaign_setting->toArray());
    }

    /**
     *
     */
    public function deleteMany()
    {
        $this->call('delete', 'campaign-settings');
    }

    /**
     * @return CampaignSetting[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'campaign-settings');
    }

    /**
     * @param CampaignSetting[] $campaign_settings
     *
     * @return CampaignSetting[]
     * @throws ErrorException
     */
    public function saveMany(array $campaign_settings)
    {
        foreach ($campaign_settings as $key => $campaign_setting) {
            $campaign_settings[$key] = $campaign_setting->toArray();
        }

        return $this->callAndCastMany('post', 'campaign-settings', ['batch' => $campaign_settings]);
    }
}
