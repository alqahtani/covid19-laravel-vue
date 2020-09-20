<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country' => 'required|string|unique:countries|max:255',
            'cases' => 'required|numeric',
            'todayCases' => 'required|numeric',
            'deaths' => 'required|numeric',
            'todayDeaths' => 'required|numeric',
            'recovered' => 'required|numeric',
            'active' => 'required|numeric',
            'critical' => 'required|numeric',
            'cpm' => 'required|numeric',
            'dpm' => 'required|numeric',
            'total_tests' => 'required|numeric',
            'tpm' => 'required|numeric',
        ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return $country;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $validatedData = $request->validate([
            'country' => 'string|max:255',
            'cases' => 'required|numeric',
            'todayCases' => 'required|numeric',
            'deaths' => 'required|numeric',
            'todayDeaths' => 'required|numeric',
            'recovered' => 'required|numeric',
            'active' => 'required|numeric',
            'critical' => 'required|numeric',
            'cpm' => 'required|numeric',
            'dpm' => 'required|numeric',
            'totalTests' => 'required|numeric',
            'tpm' => 'required|numeric',
        ]);

        // dd($country);

        // $country->update([
        //     'country' => $request->country,
        //     'cases' => $request->cases,
        //     'todayCases' => $request->todayCases,
        //     'deaths' => $request->deaths,
        //     'todayDeaths' => $request->todayDeaths,
        //     'recovered' => $request->recovered,
        //     'active' => $request->active,
        //     'critical' => $request->critical,
        //     'casesPerOneMillion' => $request->cpm,
        //     'deathsPerOneMillion' => $request->dpm,
        //     'totalTests' => $request->totalTests,
        //     'testsPerOneMillion' => $request->tpm,
        // ]);

        $country->cases = $request->cases;

        $country->save();

        // return redirect()->route('countries.show', $country)->with('status', 'Country updated!');
        return back()->with('status', 'Country updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('index');
    }
}
