<?php

use App\Http\Controllers\CountryController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $allCountries = Country::orderBy('cases', 'desc')->get();
    return view('index', compact('allCountries'));
})->name('index');

// Return a json of all Countries to populate the map and the table on index page
// Update: moved to api.php

Route::redirect('countries', '/');

// Show the create form for adding new country
Route::get('countries/new', [CountryController::class, 'create'])->name('countries.new');

// Show edit form for a specific country
Route::get('countries/{country}/edit', [CountryController::class, 'edit'])->name('countries.edit');

// Update a specific country with new data
Route::put('countries/{country}', [CountryController::class, 'update'])->name('countries.update');

// Delete a country
Route::delete('countries/{country}', [CountryController::class, 'destroy'])->name('countries.delete');

// Show details about specific country
Route::get('countries/{country}', [CountryController::class, 'show'])->name('countries.show');

// Store new country
Route::post('countries', [CountryController::class, 'store'])->name('countries.store');
