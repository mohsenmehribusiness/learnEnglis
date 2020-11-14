<?php

Route::get('','LessonController@index')->name('lesson.index');
Route::get('/{lesson}','LessonController@lesson')->name('lesson.lesson');

Route::get('/lesson-data','LessonController@AjaxQueryData')->name('lesson.data');
