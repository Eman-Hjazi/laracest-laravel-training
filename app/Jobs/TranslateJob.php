<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TranslateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //AI::translate($this->jobListing->description,'spanish');
        logger('Transaletion '. $this->jobListing->title . ' to spanish .');
    }
}
