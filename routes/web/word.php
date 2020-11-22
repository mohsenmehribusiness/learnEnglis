<?php

Route::get('','WordController@index')->name('word.index');
Route::get('/word/{word}','WordController@word')->name('word.word');
Route::get('/word-data','WordController@AjaxQueryData')->name('word.data');

Route::group(['prefix'=>'ajax'],function(){
    Route::post('/check-state','WordController@changeStateWithAjax')->name('word.state.check.ajax');// for change state
    Route::post('/get-information-word','WordController@getInformationWord')->name('word.get.information');//ajax for get information word
});

Route::group(['prefix'=>'order'],function(){
    Route::get('/old/{word}','WordController@old')->name('word.old');
    Route::get('/new/{word}','WordController@new')->name('word.new');
    Route::get('/state-check/{word}','WordController@StateCheck')->name('word.state.check');
    Route::get('/state-times/{word}','WordController@StateTimes')->name('word.state.times');
});
