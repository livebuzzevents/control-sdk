<?php

namespace Buzz\Control\Objects;

/**
 * Class Translation
 *
 * @package Buzz\Control\Objects
 */
class Translation extends Base
{
    /**
     * @var string
     */
    protected $model_id;

    /**
     * @var string
     */
    protected $model_type;

    /**
     * @var string
     */
    protected $field;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $translation;

    /**
     * @return string
     */
    public function getModelId(): string
    {
        return $this->model_id;
    }

    /**
     * @param string $model_id
     */
    public function setModelId(string $model_id)
    {
        $this->model_id = $model_id;
    }

    /**
     * @return string
     */
    public function getModelType(): string
    {
        return $this->model_type;
    }

    /**
     * @param string $model_type
     */
    public function setModelType(string $model_type)
    {
        $this->model_type = $model_type;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param string $field
     */
    public function setField(string $field)
    {
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getTranslation(): string
    {
        return $this->translation;
    }

    /**
     * @param string $translation
     */
    public function setTranslation(string $translation)
    {
        $this->translation = $translation;
    }
}
