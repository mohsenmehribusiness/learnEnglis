<?php
Route::get('','StudyController@index')->name('study.index');
Route::get('/study-data','StudyController@AjaxQueryData')->name('study.data');
Route::post('/get-information-word','StudyController@getInformationWord')->name('study.get.information.word');
Route::post('/oldest','StudyController@oldest')->name('oldest');
