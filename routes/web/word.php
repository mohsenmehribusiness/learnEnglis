<?php
Route::get('/word/{word}','WordController@word')->name('word.word');
Route::post('/checkstate','WordController@checkstate')->name('word.checkstate');


Route::get('','WordController@index')->name('word.index');
Route::get('/word-data','WordController@AjaxQueryData')->name('word.data');
/*order*/
//  old
Route::get('/old','WordController@old')->name('word.old');
Route::get('/word-data-old','WordController@AjaxQueryDataOld')->name('word.data.old');
//  new
Route::get('/new','WordController@new')->name('word.new');
Route::get('/word-data-new','WordController@AjaxQueryDataNew')->name('word.data.new');
//  state check
Route::get('/state-check','WordController@StateCheck')->name('word.state.check');
Route::get('/word-data-state-check','WordController@AjaxQueryDataStateCheck')->name('word.data.state.check');
//  state times
Route::get('/state-times','WordController@StateTimes')->name('word.state.times');
Route::get('/word-data-state-times','WordController@AjaxQueryDataStateTimes')->name('word.data.state.times');
/*order*/
//ajax
