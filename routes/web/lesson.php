<?php
Route::get('','LessonController@index')->name('lesson.index');
Route::get('/in-table','LessonController@indexTable')->name('lesson.table.index');
Route::get('{lesson}','LessonController@lesson')->name('lesson.lesson');
Route::get('lesson-data','LessonController@AjaxQueryData')->name('lesson.data');

//  old
Route::get('/old/{lesson}','LessonController@old')->name('lesson.old');
//  new
Route::get('/new/{lesson}','LessonController@new')->name('lesson.new');
//  state check
Route::get('/state-check/{lesson}','LessonController@StateCheck')->name('lesson.state.check');
//  state times
Route::get('/state-times/{lesson}','LessonController@StateTimes')->name('lesson.state.times');
