<?php

namespace App\Jobs;

use App\Models\Country;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessUpdateCountry implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $newData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($newData)
    {
        $this->newData = $newData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Country::where('country', $this->newData->country)->update([
            'cases' => $this->newData->cases,
            'todayCases' => $this->newData->todayCases,
            'deaths' => $this->newData->deaths,
            'todayDeaths' => $this->newData->todayDeaths,
            'recovered' => $this->newData->recovered,
            'active' => $this->newData->active,
            'critical' => $this->newData->critical,
            'casesPerOneMillion' => $this->newData->casesPerOneMillion,
            'deathsPerOneMillion' => $this->newData->deathsPerOneMillion,
            'totalTests' => $this->newData->totalTests,
            'testsPerOneMillion' => $this->newData->testsPerOneMillion,
        ]);
    }
}
