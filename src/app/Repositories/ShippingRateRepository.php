<?php

namespace App\Repositories;

use App\Models\ShippingRate;
use App\Repositories\Contracts\ShippingRateRepositoryContract;

/**
 * [Description ShippingRateRepository]
 * 
 * @package ShippingRate
 * @author Julio Cesar
 */
class ShippingRateRepository extends BaseRepository implements ShippingRateRepositoryContract
{
    public function __construct(ShippingRate $repository) {
        $this->repository = $repository;
    }
}