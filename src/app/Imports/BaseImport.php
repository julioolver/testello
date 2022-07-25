<?php

namespace App\Imports;

class BaseImport
{
    const ROWS_TO_QUEUE = 15000;
    const ROWS_TO_INSERT = 7500;

    public function chunkSize(): int
    {
        return self::ROWS_TO_QUEUE;
    }

    public function batchSize(): int
    {
        return self::ROWS_TO_INSERT;
    }
}
