<?php
// index
Route::get('','StudyController@index')->name('study.index');
Route::get('/study-data','StudyController@AjaxQueryData')->name('study.data');
Route::get('/change-choose/{choose}','StudyController@changeChoose')->name('study.change.choose');
