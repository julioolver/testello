<?php

namespace App\Services;

use App\Imports\ShippingRatesImport;
use App\Jobs\ImportShippingRates;
use Maatwebsite\Excel\Facades\Excel;

/**
 * [Description ShippingRateService]
 * 
 * @package ShippingRate
 * @author Julio Cesar
 */
class ShippingRateService
{
    public function import(object $file)
    {
        $filePath = $this->localUpload($file);

        ImportShippingRates::dispatch($filePath);
    }

    private function localUpload(object $file)
    {
        $name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $hash = md5(uniqid(rand(), true));

        $filePath = $file->storeAs('imports/shipping-rate', "{$hash}.${extension}");
        
        return $filePath;
    }
}