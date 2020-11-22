<?php

Route::get('','TagController@index')->name('tag.index');
Route::get('/sort-with-letter','TagController@tagLetter')->name('tag.letter');
Route::get('/{tag}','TagController@tag')->name('tag.tag');
Route::get('sentence/{tag}','TagController@tagSentence')->name('tag.sentence.tag');
Route::get('word/{tag}','TagController@tagWord')->name('tag.word.tag');
Route::post('info','TagController@tagInfo')->name('tag.info');

Route::group(['prefix'=>'order'],function (){
    Route::get('/old/{tag}','TagController@old')->name('tag.old');
    Route::get('/new/{tag}','TagController@new')->name('tag.new');
    Route::get('/state-check/{tag}','TagController@StateCheck')->name('tag.state.check');
    Route::get('/state-times/{tag}','TagController@StateTimes')->name('tag.state.times');
});
