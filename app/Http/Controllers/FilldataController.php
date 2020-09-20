<?php

namespace App\Http\Controllers;

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

            // Country::create([
            // 'country' => 'Saudi Arabia',
            // 'cases' => 329271,
            // 'todayCases' => 551,
            // 'deaths' => 4458,
            // 'todayDeaths' => 28,
            // 'recovered' => 309430,
            // 'active' => 15383,
            // 'critical' => 1166,
            // 'casesPerOneMillion' => 9427,
            // 'deathsPerOneMillion' => 128,
            // 'totalTests' => 6009916,
            // 'testsPerOneMillion' => 172058,
            // ]);

            // return $current_countries[0];

            /*
                ----------------------------
                    || DB Data sample ||
                ----------------------------
                {
                    id: 1,
                    country: "Saudi Arabia",
                    cases: 329271,
                    todayCases: 551,
                    deaths: 4458,
                    todayDeaths: 28,
                    recovered: 309430,
                    active: 15383,
                    critical: 1166,
                    casesPerOneMillion: 9427,
                    deathsPerOneMillion: 128,
                    totalTests: 6009916,
                    testsPerOneMillion: 172058,
                    lat: null,
                    lng: null,
                    flag: null,
                    created_at: "2020-09-19T16:06:24.000000Z",
                    updated_at: "2020-09-19T16:06:24.000000Z",
                }
            */

            /*
                
                1. Iterate through new countries list from API
                2. Check if country exist in the current database already.
                3. If country already exists check the 'cases' number
                4. If 'cases' number the same skip to the next country in the new countries list.
                5. If 'cases' is not the same update the entry with the new data.
                6. If the country does not exist in the current DB create new country with the new data and retrieve the missing data from the other API of countries information.

            */

            $currentCountries = Country::all();

            foreach ($countries as $newCountry) {
                $countryName = $newCountry->country;
                // Check if country existed on the current DB
                if ($currentCountries->contains('country', $countryName)) {
                    $currentCountry = $currentCountries->firstWhere('country', $countryName);
                    if ($currentCountry->cases != $newCountry->cases) {
                        Country::where('country', $countryName)
                            ->update([
                                'cases' => $newCountry->cases,
                                'todayCases' => $newCountry->todayCases,
                                'deaths' => $newCountry->deaths,
                                'todayDeaths' => $newCountry->todayDeaths,
                                'recovered' => $newCountry->recovered,
                                'active' => $newCountry->active,
                                'critical' => $newCountry->critical,
                                'casesPerOneMillion' => $newCountry->casesPerOneMillion,
                                'deathsPerOneMillion' => $newCountry->deathsPerOneMillion,
                                'totalTests' => $newCountry->totalTests,
                                'testsPerOneMillion' => $newCountry->testsPerOneMillion,
                            ]);
                    }
                } else {
                    if ($newCountry->country != 'World') {
                        $country = new Country();

                        $country->country = $newCountry->country;
                        $country->cases = $newCountry->cases;
                        $country->todayCases = $newCountry->todayCases;
                        $country->deaths = $newCountry->deaths;
                        $country->todayDeaths = $newCountry->todayDeaths;
                        $country->recovered = $newCountry->recovered;
                        $country->active = $newCountry->active;
                        $country->critical = $newCountry->critical;
                        $country->casesPerOneMillion = $newCountry->casesPerOneMillion;
                        $country->deathsPerOneMillion = $newCountry->deathsPerOneMillion;
                        $country->totalTests = $newCountry->totalTests;
                        $country->testsPerOneMillion = $newCountry->testsPerOneMillion;

                        // // get the extra data for the new country
                        // $countryExtrasRequest = Http::get('https://restcountries.eu/rest/v2/name/' . $countryName . '?fullText=true');
                        // $countryExtraInfo = $countryExtrasRequest->json();

                        // if ($countryExtrasRequest->status() == 200) {
                        //     $country->lat = $countryExtraInfo[0]['latlng'][0];
                        //     $country->lng = $countryExtraInfo[0]['latlng'][1];
                        //     $country->flag = $countryExtraInfo[0]['flag'];
                        // }

                        $country->save();
                    }
                }
            }

            return 'Done. take a look at DB .. hope is everything is good :)';
        }


        // return $names;
    }
}
