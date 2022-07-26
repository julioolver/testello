<?php

namespace App\Jobs;

use App\Imports\ShippingRatesImport;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Job para adicionar a importação na fila
 * A importação é dividida para cada 15 mil arquivos, um processo na fila (configuração setada na classe BaseImport)
 * 
 * @package Jobs
 * @author Julio Cesar
 */
class ImportShippingRates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected string $filePath, protected int $userId)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Excel::import(new ShippingRatesImport($this->userId), $this->filePath);

            Storage::delete($this->filePath);
        } catch (\Throwable $th) {
            throw new Exception($th);
        }
    }
}
