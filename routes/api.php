<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CityController;
use \App\Http\Controllers\Api\CountryLangController;
use App\Http\Controllers\Api\CityLangController;


//Route::get('/countries', [\App\Http\Controllers\Api\ServiceController::class, 'index']);
//Route::get('/countries/{id}', [\App\Http\Controllers\Api\ServiceController::class, 'show']);

Route::get('/countries', [CountryController::class, 'index']);
Route::post('/country', [CountryController::class, 'store']);
Route::get('/country/{id}', [CountryController::class, 'show']);
Route::put('/country/{id}', [CountryController::class, 'update']);
Route::delete('/country/{id}', [CountryController::class, 'destroy']);

Route::get('/cities', [CityController::class, 'index']);
Route::post('/city', [CityController::class, 'store']);
Route::get('/city/{id}', [CityController::class, 'show']);
Route::put('/city/{id}', [CityController::class, 'update']);
Route::delete('/city/{id}', [CityController::class, 'destroy']);

Route::get('/countries-lang', [CountryLangController::class, 'index']);
Route::post('/country-lang', [CountryLangController::class, 'store']);
Route::get('/country-lang/{id}', [CountryLangController::class, 'show']);
Route::put('/country-lang/{id}', [CountryLangController::class, 'update']);
Route::delete('/country-lang/{id}', [CountryLangController::class, 'destroy']);

Route::get('/cities-lang', [CityLangController::class, 'index']);
Route::post('/city-lang', [CityLangController::class, 'store']);
Route::get('/city-lang/{id}', [CityLangController::class, 'show']);
Route::put('/city-lang/{id}', [CityLangController::class, 'update']);
Route::delete('/city-lang/{id}', [CityLangController::class, 'destroy']);
