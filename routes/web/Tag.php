<?php

Route::get('','TagController@index')->name('tag.index');
Route::get('/in-table','TagController@indexTable')->name('tag.table.index');
Route::get('/{tag}','TagController@tag')->name('tag.tag');

//  old
Route::get('/old/{tag}','TagController@old')->name('tag.old');
//  new
Route::get('/new/{tag}','TagController@new')->name('tag.new');
//  state check
Route::get('/state-check/{tag}','TagController@StateCheck')->name('tag.state.check');
//  state times
Route::get('/state-times/{tag}','TagController@StateTimes')->name('tag.state.times');
