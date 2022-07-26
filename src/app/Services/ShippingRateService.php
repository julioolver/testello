<?php

namespace App\Services;

use App\Jobs\ImportShippingRates;
use App\Repositories\Contracts\ShippingRateRepositoryContract;
use App\Services\Contracts\ShippingRateServiceContract;

/**
 * Classe para abstrair do controller a responsábilidade de regra do negócio referente as taxas de envio.
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

    /**
     * Realiza o dispatch para a fila da importação
     * 
     * @param object $file
     * 
     * @return void
     */
    public function import(object $file): void
    {
        $filePath = $this->localUpload($file);

        ImportShippingRates::dispatch($filePath, auth()->id());
    }

    /**
     * Realiza o store no local
     * 
     * @param object $file
     * 
     * @return string
     */
    private function localUpload(object $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $hash = md5(uniqid(rand(), true));

        $filePath = $file->storeAs('imports/shipping-rate', "{$hash}.${extension}");

        return $filePath;
    }
}
