<?php

namespace App\Services\Contracts;

/**
 * [Description ShippingRateContract]
 * 
 * @package ShippingRate
 * @author Julio Cesar
 */
interface ShippingRateContract extends BaseServiceContract
{
    public function import(object $file): void;
}