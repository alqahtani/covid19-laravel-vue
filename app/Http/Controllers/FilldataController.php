<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessAddCountry;
use App\Jobs\ProcessUpdateCountry;
use App\Models\Country;
use Illuminate\Support\Facades\Http;

class FilldataController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // [1] Get data from API
        $response = Http::get('https://coronavirus-19-api.herokuapp.com/countries');


        // [2] check if http request is success
        if ($response->status() == 200) {
            // [3] Create a Collection of the retrieved data
            $countries = collect(json_decode($response->body()));


            $currentCountries = Country::all();

            foreach ($countries as $key => $newCountry) {
                $countryName = $newCountry->country;
                // Check if country existed on the current DB
                if ($currentCountries->contains('country', $countryName)) {
                    $currentCountry = $currentCountries->firstWhere('country', $countryName);
                    if ($currentCountry->cases != $newCountry->cases) {
                        ProcessUpdateCountry::dispatch($newCountry);
                    }
                } else {
                    if ($newCountry->country != 'World') {
                        ProcessAddCountry::dispatch($newCountry);
                    }
                }
            }

            return 'Request accepted!';
        }
    }
}
