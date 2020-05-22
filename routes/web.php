<?php

use Illuminate\Support\Facades\Route;


Route::get('/','MoviesController@index')->name('movies.index');
Route::get('/movies/{movies}','MoviesController@show')->name('movies.show');

Route::get('/actors','actorsController@index')->name('actors.index');

Route::get('/actors/page/{page?}','actorsController@index');
Route::get('/actors/{actor}','actorsController@show')->name('actors.show');

Route::get('/tv','TvController@index');


