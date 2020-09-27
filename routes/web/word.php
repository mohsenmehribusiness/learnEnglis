<?php

Route::get('','WordController@index')->name('word.index');
Route::get('/{word}','WordController@word')->name('word.word');
Route::get('/word-data','WordController@AjaxQueryData')->name('word.data');
//ajax
Route::post('/checkstate','WordController@checkstate')->name('word.checkstate');
