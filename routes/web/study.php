<?php
// index
Route::get('','StudyController@index')->name('study.index');
Route::get('/study-data','StudyController@AjaxQueryData')->name('study.data');
//  old
Route::get('/old','StudyController@old')->name('study.old');
Route::get('/study-data-old','StudyController@AjaxQueryDataOld')->name('study.data.old');
//  new
Route::get('/new','StudyController@new')->name('study.new');
Route::get('/study-data-new','StudyController@AjaxQueryDataNew')->name('study.data.new');
//  state check
Route::get('/state-check','StudyController@StateCheck')->name('study.state.check');
Route::get('/study-data-state-check','StudyController@AjaxQueryDataStateCheck')->name('study.data.state.check');
//  state times
Route::get('/state-times','StudyController@StateTimes')->name('study.state.times');
Route::get('/study-data-state-times','StudyController@AjaxQueryDataStateTimes')->name('study.data.state.times');

Route::get('/study-data','StudyController@AjaxQueryData')->name('study.data');

Route::post('/get-information-word','StudyController@getInformationWord')->name('study.get.information.word');
