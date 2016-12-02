<?php

namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\FileActivity;

/**
 * Class FileActivityService
 *
 * @package Buzz\Control\Services
 */
class FileActivityService extends Service
{
    /**
     * @var
     */
    protected static $cast = FileActivity::class;

    /**
     * @param FileActivity $fileActivity
     *
     * @return FileActivity
     * @throws ErrorException
     */
    public function get(FileActivity $fileActivity)
    {
        if (!$fileActivity->getId()) {
            throw new ErrorException('FileActivity id required!');
        }

        return $this->callAndCast('get', "file-activity/{$fileActivity->getId()}");
    }

    /**
     * @param FileActivity $fileActivity
     *
     * @throws ErrorException
     */
    public function delete(FileActivity $fileActivity)
    {
        if (!$fileActivity->getId()) {
            throw new ErrorException('FileActivity id required!');
        }

        $this->call('delete', "file-activity/{$fileActivity->getId()}");
    }

    /**
     * @param FileActivity $fileActivity
     *
     * @return FileActivity
     * @throws ErrorException
     */
    public function save(FileActivity $fileActivity)
    {
        if ($fileActivity->getId()) {
            $verb = 'put';
            $url  = 'file-activity/' . $fileActivity->getId();
        } else {
            $verb = 'post';
            $url  = 'file-activity';
        }

        return $this->callAndCast($verb, $url, $fileActivity->toArray());
    }

    public function deleteMany()
    {
        $this->call('delete', 'file-activities');
    }

    /**
     * @return FileActivity[]
     */
    public function getMany()
    {
        return $this->callAndCastMany('get', 'file-activities');
    }

    /**
     * @param FileActivity[] $fileActivities
     *
     * @return FileActivity[]
     * @throws ErrorException
     */
    public function saveMany(array $fileActivities)
    {
        foreach ($fileActivities as $key => $fileActivity) {
            $fileActivities[$key] = $fileActivity->toArray();
        }

        return $this->callAndCastMany('post', 'file-activities', ['batch' => $fileActivities]);
    }
}
