<?php namespace Buzz\Control\Services;

use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Objects\File;

/**
 * Class FileService
 *
 * @package Buzz\Control\Services
 */
class FileService extends Service
{
    protected static $cast = File::class;

    public function listFiles($model_name, $model_id)
    {
        if (!$model_name) {
            throw new ErrorException('Model name required!');
        }

        if (!$model_id) {
            throw new ErrorException('Model id required!');
        }

        return $this->callAndCastMany('get', "file/{$model_name}/{$model_id}/list");
    }

    public function add($model_name, $model_id, $filename, $content)
    {
        if (!$model_name) {
            throw new ErrorException('Model name required!');
        }

        if (!$model_id) {
            throw new ErrorException('Model id required!');
        }

        return $this->callAndCast('post', "file/{$model_name}/{$model_id}/add", [
            'file' => [
                'content' => base64_encode($content),
                'name'    => $filename,
            ],
        ]);
    }

    public function systemFile($model_name, $model_id, $identifier)
    {
        if (!$model_name) {
            throw new ErrorException('Model name required!');
        }

        if (!$model_id) {
            throw new ErrorException('Model id required!');
        }

        if (!$identifier) {
            throw new ErrorException('Identifier required!');
        }

        return $this->callAndCast('get', "file/{$model_name}/{$model_id}/{$identifier}/file");
    }

    public function fileSettings($model_name, $model_id, $identifier)
    {
        if (!$model_name) {
            throw new ErrorException('Model name required!');
        }

        if (!$model_id) {
            throw new ErrorException('Model id required!');
        }

        if (!$identifier) {
            throw new ErrorException('Identifier required!');
        }

        return $this->call('get', "file/{$model_name}/{$model_id}/{$identifier}/file-settings");
    }

    public function addSystem($model_name, $model_id, $identifier, $filename, $content)
    {
        if (!$model_name) {
            throw new ErrorException('Model name required!');
        }

        if (!$model_id) {
            throw new ErrorException('Model id required!');
        }

        if (!$identifier) {
            throw new ErrorException('Identifier required!');
        }

        return $this->callAndCast('post', "file/{$model_name}/{$model_id}/{$identifier}/add", [
            'file' => [
                'content' => base64_encode($content),
                'name'    => $filename,
            ],
        ]);
    }

    public function download(File $file)
    {
        if (!$file->getId()) {
            throw new ErrorException('File id required!');
        }

        return $this->call('get', "file/{$file->getId()}/download");
    }

    public function toggleVisibility(File $file)
    {
        if (!$file->getId()) {
            throw new ErrorException('File id required!');
        }

        return $this->call('get', "file/{$file->getId()}/toggle-visibility");
    }

    public function edit(File $file)
    {
        if (!$file->getId()) {
            throw new ErrorException('File id required!');
        }

        return $this->callAndCast('put', "file/{$file->getId()}/edit", $file->toArray());
    }

    public function delete(File $file)
    {
        if (!$file->getId()) {
            throw new ErrorException('File id required!');
        }

        $this->call('delete', "file/{$file->getId()}/delete");
    }
}
