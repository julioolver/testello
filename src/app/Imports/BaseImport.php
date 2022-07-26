<?php

namespace App\Imports;

/**
 * Configurações base para importação de CSV
 * 
 * @package Imports
 * @author Julio Cesar
 */
class BaseImport
{
    const ROWS_TO_QUEUE = 15000;
    const ROWS_TO_INSERT = 7500;

    /**
     * Define o número máximo de registros por processo na fila.
     * 
     * @return int
     */
    public function chunkSize(): int
    {
        return self::ROWS_TO_QUEUE;
    }

    /**
     * Define o número máximo de registros inseridos por vez.
     * 
     * @return int
     */
    public function batchSize(): int
    {
        return self::ROWS_TO_INSERT;
    }
}
