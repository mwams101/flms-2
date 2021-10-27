<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ClubController;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('/index');
});


//league section
Route::get('/leagues/create', function () {
    return view('leagues.create');
});
Route::get('add-league', [LeagueController::class, 'create']);
Route::post('add-league', [LeagueController::class, 'store']);
Route::get('/leagues/view', [LeagueController::class, 'index']);
Route::get('edit-league/{id}', [LeagueController::class, 'edit']);
Route::put('update-league/{id}', [LeagueController::class, 'update']);
Route::delete('delete-league/{id}', [LeagueController::class, 'destroy'])->name('destroy');

//season
Route::get('/season/create', function () {
    return view('season.create');
});
Route::get('add-season', [SeasonController::class, 'create']);
Route::post('add-season', [SeasonController::class, 'store']);
Route::get('/season/view', [SeasonController::class, 'index']);
Route::get('edit-season/{id}', [SeasonController::class, 'edit']);
Route::put('update-season/{id}', [SeasonController::class, 'update']);
Route::delete('delete-season/{id}', [SeasonController::class, 'destroy'])->name('destroy');

//Tables section
Route::get('/tables/create', function () {
    return view('tables.create');
});
Route::get('add-table', [TableController::class, 'create']);
Route::post('add-table', [TableController::class, 'store']);
Route::get('/tables/view', [TableController::class, 'index']);
Route::get('edit-table/{id}', [TableController::class, 'edit']);
Route::put('update-table/{id}', [TableController::class, 'update']);
Route::delete('delete-table/{id}', [TableController::class, 'destroy'])->name('destroy');

/**
 *  Clubs Routes
 **/
Route::prefix('clubs')->middleware(['auth'])->group(function () {
    Route::get('/manage', [ClubController::class, 'manage'])->name('clubs.manage');
    Route::get('/create', [ClubController::class, 'create'])->name('clubs.create');
    Route::post('/store', [ClubController::class, 'store'])->name('clubs.store');
    Route::get('/{club}/show', [ClubController::class, 'show'])->name('clubs.show');
    Route::get('/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::patch('/{club}/update', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('/{club}/delete', [ClubController::class, 'destroy'])->name('clubs.delete');
});


//player section
Route::get('/players/create', function () {
    return view('players.create');
});
Route::get('add-player', [PlayerController::class, 'create']);
Route::post('add-player', [PlayerController::class, 'store']);
Route::get('/players/view', [PlayerController::class, 'index']);
Route::get('edit-player/{id}', [PlayerController::class, 'edit']);
Route::put('update-player/{id}', [PlayerController::class, 'update']);
Route::delete('delete-player/{id}', [PlayerController::class, 'destroy'])->name('destroy');




/**
 *  Counties Routes
 **/
//Route::get('/countries/manage','App\Http\Controllers\CountryController@manage')->name('manage.countries');
//Route::get('/countries/create','App\Http\Controllers\CountryController@create')->name('create.countries');
//Route::post('/countries/store','App\Http\Controllers\CountryController@store')->name('store.countries');
//Route::get('/countries/{country}/show','App\Http\Controllers\CountryController@show')->name('show.countries');
//Route::patch('/countries/{country}/update','App\Http\Controllers\CountryController@update')->name('update.countries');
//Route::delete('/countries/{country}/delete','App\Http\Controllers\CountryController@delete')->name('delete.countries');
/*
Route::get('/countries/create', function () {
    return view('countries.create');
});
Route::get('insert','App\Http\Controllers\CountryController@create');
Route::post('create','App\Http\Controllers\CountryController@insert');
Route::get('/countries/view', [App\Http\Controllers\CountryController::class, 'index'])->name('view');
*/
