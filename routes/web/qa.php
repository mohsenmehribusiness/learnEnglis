<?php

Route::get('','QaController@index')->name('qa.index');
Route::get('show/{qa}','QaController@show')->name('qa.show');
Route::post('get-info','QaController@getInfo')->name('qa.get.info');
