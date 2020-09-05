<?php

use Illuminate\Support\Facades\Route;
Route::get('/','WordController@index')->name('home');
Route::post('/checkstate','WordController@checkstate')->name('checkstate');
Route::post('/get-information-word','WordController@getInformationWord')->name('get.information.word');
Route::get('/study','WordController@study')->name('study');
Route::get('/insert','WordController@insertWordGet')->name('insert.word');
Route::post('/insert','WordController@insertWordPost')->name('insert.word');
