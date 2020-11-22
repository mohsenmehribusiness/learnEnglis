<?php
Route::get('','SentenceController@index')->name('sentence.index');
Route::get('/{sentence}','SentenceController@sentence')->name('sentence.sentence');

Route::group(['prefix'=>'ajax'],function (){
    Route::post('/check-state','SentenceController@changeStateWithAjax')->name('sentence.state.check.ajax');
});

Route::group(['prefix'=>'order'],function (){
    Route::get('/old/{sentence}','SentenceController@old')->name('sentence.old');
    Route::get('/new/{sentence}','SentenceController@new')->name('sentence.new');
    Route::get('/state-check/{sentence}','SentenceController@StateCheck')->name('sentence.state.check');
    Route::get('/state-times/{sentence}','SentenceController@StateTimes')->name('sentence.state.times');
});
