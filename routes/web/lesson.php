<?php
Route::get('','LessonController@index')->name('lesson.index');
Route::get('/sort-with-letter','LessonController@lessonLetter')->name('lesson.letter');
Route::get('/in-table','LessonController@indexTable')->name('lesson.table.index');
Route::get('{lesson}','LessonController@lesson')->name('lesson.lesson');
Route::get('sentence/{lesson}','LessonController@lessonSentence')->name('lesson.sentence.lesson');
Route::get('word/{lesson}','LessonController@lessonWord')->name('lesson.word.lesson');
Route::post('info','LessonController@lessonInfo')->name('lesson.info');
Route::get('lesson-data','LessonController@AjaxQueryData')->name('lesson.data');


Route::group(['prefix'=>'order'],function(){
    Route::get('/old/{lesson}','LessonController@old')->name('lesson.old');
    Route::get('/new/{lesson}','LessonController@new')->name('lesson.new');
    Route::get('/state-check/{lesson}','LessonController@StateCheck')->name('lesson.state.check');
    Route::get('/state-times/{lesson}','LessonController@StateTimes')->name('lesson.state.times');
});
