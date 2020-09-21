<?php

Route::get('','LessonController@index')->name('lesson.index');
Route::get('/{lesson}','LessonController@lesson')->name('lesson.lesson');
