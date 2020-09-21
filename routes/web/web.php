<?php

// web
Route::get('/oldest','WebController@oldest')->name('web.oldest');
Route::get('/newest','WebController@newest')->name('web.newest');
Route::get('/state/true','WebController@stateTrue')->name('web.state.true');
Route::get('/state/false','WebController@stateFalse')->name('web.state.false');
//ajax

// home
Route::get('/','HomeController@index')->name('home');
