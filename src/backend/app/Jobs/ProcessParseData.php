<?php

namespace App\Jobs;

use App\Models\ParseData;
use App\Service\Parse\Data\Processor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessParseData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected ParseData $parseData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ParseData $parseData)
    {
        $this->parseData = $parseData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Processor $processor)
    {
        $processor->process($this->parseData);
    }
}
