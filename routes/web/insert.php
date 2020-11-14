<?php

Route::get('','InsertController@insert')->name('insert');
Route::post('word','InsertController@insertWord')->name('insert.word');
Route::post('sentence','InsertController@insertSentence')->name('insert.sentence');
Route::get('lesson','InsertController@insertLessonGet')->name('insert.lesson.get');
Route::post('lesson','InsertController@insertLesson')->name('insert.lesson');

//multi
Route::group(['prefix'=>'multi'],function(){
    Route::get('word','InsertController@insertMultiWord')->name('insert.multi.word');
    Route::get('sentence','InsertController@insertMultiSentence')->name('insert.multi.sentence');
    Route::post('word','InsertController@insertMultiWordPost')->name('insert.multi.word.post');
    Route::post('sentence','InsertController@insertMultiSentencePost')->name('insert.multi.sentence.post');
});
