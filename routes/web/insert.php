<?php

Route::get('','InsertController@insert')->name('insert');
Route::post('word','InsertController@insertWordPost')->name('insert.word');
Route::post('sentence','InsertController@insertSentencePost')->name('insert.sentence');

// insert lesson
Route::get('lesson','InsertController@insertLessonGet')->name('insert.lesson.get');
Route::post('lesson','InsertController@insertLessonPost')->name('insert.lesson');

# edit routes ...
Route::get('lesson/edit/{lesson}','InsertController@editLessonGet')->name('insert.lesson.edit.get');
Route::post('lesson/edit/{lesson}','InsertController@editLessonPost')->name('insert.lesson.edit.post');
Route::get('lesson/edit/{lesson}','InsertController@editLessonGet')->name('insert.lesson.edit.get');
Route::post('lesson/edit/{lesson}','InsertController@editLessonPost')->name('insert.lesson.edit.post');
Route::get('word/edit/{word}','InsertController@editWordGet')->name('insert.word.edit.get');
Route::post('word/edit/{word}','InsertController@editWordPost')->name('insert.word.edit.post');
Route::get('sentence/edit/{word}','InsertController@editSentenceGet')->name('insert.sentence.edit.get');
Route::post('sentence/edit/{word}','InsertController@editSentencePost')->name('insert.sentence.edit.post');
# edit routes ...

//multi
Route::group(['prefix'=>'multi'],function(){
    Route::get('word','InsertController@insertMultiWordGet')->name('insert.multi.word');
    Route::get('sentence','InsertController@insertMultiSentenceGet')->name('insert.multi.sentence');
    Route::post('word','InsertController@insertMultiWordPost')->name('insert.multi.word.post');
    Route::post('sentence','InsertController@insertMultiSentencePost')->name('insert.multi.sentence.post');
});
