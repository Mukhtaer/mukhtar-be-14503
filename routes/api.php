<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/movies', 'App\Http\Controllers\MovieController@index');
// Route::get('/movies/{id}', 'App\Http\Controllers\MovieController@show');
// Route::post('/movies', 'App\Http\Controllers\MovieController@store');
Route::get('/genre', 'App\Http\Controllers\GenreController@index');
