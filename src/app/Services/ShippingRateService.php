<?php

namespace App\Services;

use App\Jobs\ImportShippingRates;
use App\Repositories\Contracts\ShippingRateRepositoryContract;
use App\Services\Contracts\ShippingRateServiceContract;

/**
 * [Description ShippingRateService]
 * 
 * @package ShippingRate
 * @author Julio Cesar
 */
class ShippingRateService extends BaseService implements ShippingRateServiceContract
{
    public function __construct(ShippingRateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function import(object $file): void
    {
        $filePath = $this->localUpload($file);

        ImportShippingRates::dispatch($filePath);
    }

    private function localUpload(object $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $hash = md5(uniqid(rand(), true));

        $filePath = $file->storeAs('imports/shipping-rate', "{$hash}.${extension}");

        return $filePath;
    }
}
