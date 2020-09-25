<?php

namespace App\Console\Commands;

use App\Jobs\ImportModelsJob;
use App\Services\Import\ImportModelsInterface;
use Illuminate\Console\Command;

class ImportModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import models from api';

    public function handle()
    {
        //iterate each make and get models
        $modelsByMake = resolve(ImportModelsInterface::class)->modelsList();

        //generator used for makes
        foreach ($modelsByMake as $models) {
            dispatch(new ImportModelsJob($models));
        }
    }
}
