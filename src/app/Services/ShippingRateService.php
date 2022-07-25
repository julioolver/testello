<?php

namespace App\Services;

use App\Imports\ShippingRatesImport;
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
        Excel::import(new ShippingRatesImport, $file);
    }
}