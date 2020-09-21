<?php

Route::get('','WordController@index')->name('word.index');
Route::get('/{word}','WordController@word')->name('word.word');

//ajax
Route::post('/checkstate','WordController@checkstate')->name('word.checkstate');
