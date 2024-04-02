<?php

namespace Aamroni\Aamarpay\Traits;

use Illuminate\Support\Facades\File;

trait ConfigFileContentTrait
{
    /**
     * Get the config file content
     * @return array|object
     */
    protected function configFileContent(): array|object
    {
        if (!is_null(config(key: 'aamarpay'))) {
            $response = config(key: 'aamarpay');
        } else {
            $response = File::getRequire(path: __DIR__ . '/../../config/aamarpay.php');
        }
        return json_decode(json: json_encode(value: $response));
    }
}
