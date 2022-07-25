<?php

namespace App\Imports;

use App\Models\ShippingRate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ShippingRatesImport implements ToModel, WithChunkReading, ShouldQueue
{
    const ROWS_TO_QUEUE = 10000;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ShippingRate([
            'from_postcode' => $row[0],
            'to_postcode' => $row[1],
            'from_weight' => $row[2],
            'to_weight' => $row[3],
            'cost' => $row[4],
            'user_id' => 1
        ]);
    }

    public function chunkSize(): int
    {
        return self::ROWS_TO_QUEUE;
    }
}
