<?php

namespace Alfrasc\MatomoTracker\Jobs;

use Alfrasc\MatomoTracker\LaravelMatomoTracker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessQueued implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $matomoVars, $matomoFunction, $functionVars;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($matomoVars, $matomoFunction, ...$functionVars)
    {
        $this->matomoVars = $matomoVars;
        $this->matomoFunction = $matomoFunction;
        $this->functionVars = $functionVars;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(LaravelMatomoTracker $matomoTracker)
    {
        $matomoTracker->setMatomoVariablesQueue($this->matomoVars);
        $matomoTracker->disableSendImageResponse();
        $matomoTracker->{$this->matomoFunction}(...$this->functionVars);
    }
}
