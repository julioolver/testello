<?php

namespace App\Imports;

use App\Models\ShippingRate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Crasse responsável por realizar a importação do CSV no Banco de Dados, referente a lib Maatwebsite\Excel
 * 
 * @package Imports
 * @author Julio Cesar
 */
class ShippingRatesImport extends BaseImport implements ToModel, WithChunkReading, ShouldQueue, WithBatchInserts, WithHeadingRow
{

    /**
     * Obtém o ID do usuário logado no momento que realizou o POST com a o arquivo
     * 
     * @param int
     */
    public function __construct(protected int $userId)
    {
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ShippingRate([
            'from_postcode' => $row['from_postcode'],
            'to_postcode' => $row['to_postcode'],
            'from_weight' => $row['from_weight'],
            'to_weight' => $row['to_weight'],
            'cost' => $row['cost'],
            'user_id' => $this->userId
        ]);
    }
}
