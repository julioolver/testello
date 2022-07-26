<?php

namespace App\Repositories;

use App\Models\ShippingRate;
use App\Repositories\Contracts\ShippingRateRepositoryContract;

/**
 * Classe responsável por lidar com a camada de banco de dados do sistema, em relação ao ShippingRrate.
 * 
 * @package ShippingRate
 * @author Julio Cesar
 */
class ShippingRateRepository extends BaseRepository implements ShippingRateRepositoryContract
{
    public function __construct(ShippingRate $model) {
        $this->model = $model;
    }
}