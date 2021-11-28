<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\UserInformationController;

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


/**
 *  League Routes
 **/
Route::prefix('leagues')->middleware(['auth'])->group(function () {
    Route::get('/manage', [LeagueController::class, 'manage'])->name('leagues.manage');
    Route::get('/create', [LeagueController::class, 'create'])->name('leagues.create');
    Route::post('/store', [LeagueController::class, 'store'])->name('leagues.store');
    Route::get('/{league}/show', [LeagueController::class, 'show'])->name('leagues.show');
    Route::get('/{league}/edit', [LeagueController::class, 'edit'])->name('leagues.edit');
    Route::put('/{league}/update', [LeagueController::class, 'update'])->name('leagues.update');
    Route::delete('/{league}/delete', [LeagueController::class, 'destroy'])->name('leagues.delete');
});

/**
 *  season Routes
 **/
Route::prefix('season')->middleware(['auth'])->group(function () {
    Route::get('/manage', [SeasonController::class, 'manage'])->name('season.manage');
    Route::get('/create', [SeasonController::class, 'create'])->name('season.create');
    Route::post('/store', [SeasonController::class, 'store'])->name('season.store');
    Route::get('/{season}/show', [SeasonController::class, 'show'])->name('season.show');
    Route::get('/{season}/edit', [SeasonController::class, 'edit'])->name('season.edit');
    Route::put('/{season}/update', [SeasonController::class, 'update'])->name('season.update');
    Route::delete('/{season}/delete', [SeasonController::class, 'destroy'])->name('season.delete');
});

/**
 *  tables Routes
 **/
Route::prefix('tables')->middleware(['auth'])->group(function () {
    Route::get('/manage', [TableController::class, 'manage'])->name('tables.manage');
    Route::get('/create', [TableController::class, 'create'])->name('tables.create');
    Route::post('/store', [TableController::class, 'store'])->name('tables.store');
    Route::get('/{table}/show', [TableController::class, 'show'])->name('tables.show');
    Route::get('/{table}/edit', [TableController::class, 'edit'])->name('tables.edit');
    Route::put('/{table}/update', [TableController::class, 'update'])->name('tables.update');
    Route::delete('/{table}/delete', [TableController::class, 'destroy'])->name('tables.delete');
});

/**
 *  Clubs Routes
 **/
Route::prefix('clubs')->middleware(['auth'])->group(function () {
    Route::get('/manage', [ClubController::class, 'manage'])->name('clubs.manage');
    Route::get('/create', [ClubController::class, 'create'])->name('clubs.create');
    Route::post('/store', [ClubController::class, 'store'])->name('clubs.store');
    Route::get('/{club}/show', [ClubController::class, 'show'])->name('clubs.show');
    Route::get('/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::put('/{club}/update', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('/{club}/delete', [ClubController::class, 'destroy'])->name('clubs.delete');
});


/**
 *  players Routes
 **/
Route::prefix('players')->middleware(['auth'])->group(function () {
    Route::get('/manage', [PlayerController::class, 'manage'])->name('players.manage');
    Route::get('/create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/store', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/{player}/show', [PlayerController::class, 'show'])->name('players.show');
    Route::get('/{player}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::put('/{player}/update', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/{player}/delete', [PlayerController::class, 'destroy'])->name('players.delete');
});
Route::prefix('user_information')->middleware(['auth'])->group(function () {
    Route::get('/edit', [UserInformationController::class, 'edit'])->name('user_information.edit');
    Route::put('/update', [UserInformationController::class, 'update'])->name('user_information.update');
});


Auth::routes();
Route::get('/change-password','App\Http\Controllers\Auth\ChangePasswordController@index')->name('change-password');
Route::post('/change-password','App\Http\Controllers\Auth\ChangePasswordController@changePassword')->name('password.update');




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
