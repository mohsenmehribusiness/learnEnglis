<?php

Route::get('','ExamController@index')->name('exam.index');
Route::get('/{option}/{number}','ExamController@ChooseOptional')->name('exam.option');
Route::post('special','ExamController@special')->name('exam.special');
