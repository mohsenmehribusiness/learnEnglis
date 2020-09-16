<?php

Route::get('','StudyController@index')->name('study.index');
Route::get('/oldest','StudyController@oldest')->name('study.oldest');
Route::get('/newest','StudyController@newest')->name('study.newest');
Route::get('/state/true','StudyController@stateTrue')->name('study.state.true');
Route::get('/state/false','StudyController@stateFalse')->name('study.state.false');
Route::post('/checkstate','StudyController@checkstate')->name('study.checkstate');
Route::post('/get-information-word','StudyController@getInformationWord')->name('study.get.information.word');
