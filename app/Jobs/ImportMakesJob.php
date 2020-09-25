<?php

namespace App\Jobs;

use App\Repositories\MakesRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportMakesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $makes;

    /**
     * Create a new job instance.
     *
     * @param array $makes
     */
    public function __construct(array $makes)
    {
        $this->makes = $makes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        resolve(MakesRepository::class)->setData($this->makes)->saveMany(true);
    }
}
