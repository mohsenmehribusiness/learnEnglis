<?php

Route::get('/','TranslateController@index')->name('translate.index');
Route::post('/ajax','TranslateController@translatePost')->name('translate.ajax');
