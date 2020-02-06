<?php

namespace Buzz\Control\Campaign;

/**
 * Class Export
 *
 * @property string $type
 * @property int $user_id
 * @property string $name
 * @property array $columns
 * @property array $option_columns
 * @property array $option_filters
 * @property string $status
 * @property int $progress
 * @property string $file_id
 * @property array $settings
 * @property string $progress_formatted
 * @property string $progress_formatted_no_decimal
 * @property string $progress_formatted_no_sign
 * @property int $progress_formatted_no_sign_no_decimal
 */
class Export extends SdkObject
{
    /**
     * @param ExportPreset $preset
     * @return Export
     */
    public function createFromPreset(ExportPreset $preset)
    {
        return $this->api()->post("export-by-preset/{$preset->id}");
    }

    /**
     * @param Export $export
     * @return Export
     */
    public function show(Export $export)
    {
        return $this->api()->get("export/{$export->id}");
    }

    /**
     * @param Export $export
     * @return string
     */
    public function download(Export $export)
    {
        return $this->api()->get("download-export/{$export->id}")['export'];
    }
}
