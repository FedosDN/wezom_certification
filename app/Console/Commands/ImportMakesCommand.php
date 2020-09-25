<?php

namespace App\Console\Commands;

use App\Jobs\ImportMakesJob;
use App\Repositories\MakesRepository;
use App\Services\Import\ImportMakesInterface;
use Illuminate\Console\Command;

class ImportMakesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:makes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import makes from API';

    public function handle()
    {
        $makes = resolve(ImportMakesInterface::class)->makesList();

        dispatch(new ImportMakesJob($makes));
    }
}
