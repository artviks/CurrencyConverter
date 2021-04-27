<?php

namespace App\Console\Commands;

use App\Services\CurrencyTableService;
use Illuminate\Console\Command;

class ImportCurrencyTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports or updates currency values in DB';
    /**
     * @var CurrencyTableService
     */
    private $service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CurrencyTableService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): void
    {
        $this->service->import();

        var_dump('Currency data imported!');
    }
}
