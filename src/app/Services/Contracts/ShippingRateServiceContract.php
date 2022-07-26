<?php

namespace App\Services\Contracts;

/**
 * Interface responsável por implementar os métodos obrigatórios para tratar a entidade ShippingRate na regra do negócio.
 * 
 * @package ShippingRate
 * @author Julio Cesar
 */
interface ShippingRateServiceContract extends BaseServiceContract
{
    public function import(object $file): void;
}
