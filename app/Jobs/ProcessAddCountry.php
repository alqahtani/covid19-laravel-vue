<?php

namespace App\Jobs;

use App\Models\Country;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ProcessAddCountry implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $countryData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($countryData)
    {
        $this->countryData = $countryData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $country = new Country();

        $country->country = $this->countryData->country;
        $country->cases = $this->countryData->cases;
        $country->todayCases = $this->countryData->todayCases;
        $country->deaths = $this->countryData->deaths;
        $country->todayDeaths = $this->countryData->todayDeaths;
        $country->recovered = $this->countryData->recovered;
        $country->active = $this->countryData->active;
        $country->critical = $this->countryData->critical;
        $country->casesPerOneMillion = $this->countryData->casesPerOneMillion;
        $country->deathsPerOneMillion = $this->countryData->deathsPerOneMillion;
        $country->totalTests = $this->countryData->totalTests;
        $country->testsPerOneMillion = $this->countryData->testsPerOneMillion;

        // get the extra data for the new country
        $countryExtrasRequest = Http::get('https://restcountries.eu/rest/v2/name/' . $this->countryData->country . '?fullText=true');
        $countryExtraInfo = $countryExtrasRequest->json();

        if ($countryExtrasRequest->status() == 200) {
            $country->lat = $countryExtraInfo[0]['latlng'][0];
            $country->lng = $countryExtraInfo[0]['latlng'][1];
            $country->flag = $countryExtraInfo[0]['flag'];
        }

        $country->save();

        // ProcessCountryInfo::dispatch($country);
    }
}
