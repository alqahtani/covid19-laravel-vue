<?php

use App\Http\Controllers\CountryController;
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
    return view('index');
});

// Return a json of all Countries to populate the map and the table on index page
// Update: moved to api.php


// Show the create form for adding new country
Route::get('countries/new', [CountryController::class, 'create']);

// Show details about specific country
Route::get('countries/{country}', [CountryController::class, 'show']);

// Store new country
Route::post('countries', [CountryController::class, 'store'])->name('countries.store');

// Show edit form for a specific country
Route::get('countries/{country}/edit', [CountryController::class, 'edit']);

// Update a specific country with new data
Route::put('countries/{country}', [CountryController::class, 'update']);
