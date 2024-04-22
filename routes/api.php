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
Route::post('/add_movie', 'App\Http\Controllers\MovieController@add_movie');
Route::post('/give_rating', 'App\Http\Controllers\MovieRatingsController@add_rating');
Route::get('/genre', 'App\Http\Controllers\GenreController@index');
Route::get('/timeslot', 'App\Http\Controllers\TimeSlotController@index');
Route::get('/specific_movie_theater', 'App\Http\Controllers\TimeSlotController@specific_movie_theater');
Route::get('/search_performer', 'App\Http\Controllers\MovieController@search_performer');
Route::get('/new_movies', 'App\Http\Controllers\MovieController@new_movies');
