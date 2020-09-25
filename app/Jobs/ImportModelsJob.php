<?php

namespace App\Jobs;

use App\Repositories\ModelsRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportModelsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $models;

    /**
     * Create a new job instance.
     *
     * @param array $models
     */
    public function __construct(array $models)
    {
        $this->models = $models;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        resolve(ModelsRepository::class)->setData($this->models)->saveMany(true);
    }
}
