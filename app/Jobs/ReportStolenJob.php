<?php

namespace App\Jobs;

use App\Repositories\ModelsRepository;
use App\Repositories\StolenCarRepository;
use App\Services\Vin\ParseVinInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReportStolenJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected ParseVinInterface $parser;
    private array $data;

    /**
     * Create a new job instance.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->parser = resolve(ParseVinInterface::class);
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $vinInfo = $this->parser->parse($this->data['vin']);
        $report = array_merge($this->data, $vinInfo);

        resolve(StolenCarRepository::class)->setData($report)->save();
    }
}
