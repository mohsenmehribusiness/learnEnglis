<?php

Route::get('','InsertController@insert')->name('insert');
Route::post('word','InsertController@insertWordPost')->name('insert.word');
Route::post('sentence','InsertController@insertSentencePost')->name('insert.sentence');

// insert question-answer
Route::group(['prefix'=>'qa'],function(){
    Route::get('qa','InsertController@insertQaGet')->name('insert.qa.get');
    Route::post('qa','InsertController@insertQaPost')->name('insert.qa');
});

// insert lesson
Route::group(['prefix'=>'lesson'],function(){
    Route::get('lesson','InsertController@insertLessonGet')->name('insert.lesson.get');
    Route::post('lesson','InsertController@insertLessonPost')->name('insert.lesson');
});

# edit routes ...
Route::group(['prefix'=>'edit'],function(){
    Route::get('lesson/{lesson}','InsertController@editLessonGet')->name('insert.lesson.edit.get');
    Route::post('lesson/{lesson}','InsertController@editLessonPost')->name('insert.lesson.edit.post');
    Route::get('tag/{tag}','InsertController@editTagGet')->name('insert.tag.edit.get');
    Route::post('tag/{tag}','InsertController@editTagPost')->name('insert.tag.edit.post');
    Route::get('word/{word}','InsertController@editWordGet')->name('insert.word.edit.get');
    Route::post('word/{word}','InsertController@editWordPost')->name('insert.word.edit.post');
    Route::get('sentence/{word}','InsertController@editSentenceGet')->name('insert.sentence.edit.get');
    Route::post('sentence/{word}','InsertController@editSentencePost')->name('insert.sentence.edit.post');
    Route::get('qa/{qa}','InsertController@editQaGet')->name('insert.qa.edit.get');
    Route::post('qa/{qa}','InsertController@editQaPost')->name('insert.qa.edit.post');
});
# edit routes ...
## delete routes ...
Route::group(['prefix'=>'delete'],function(){
    Route::get('lesson/{lesson}','InsertController@deleteLessonGet')->name('insert.lesson.delete.get');
    Route::get('tag/{tag}','InsertController@deleteLessonGet')->name('insert.tag.delete.get');
    Route::get('word/{word}','InsertController@deleteWordGet')->name('insert.word.delete.get');
    Route::post('word/{word}','InsertController@deleteWordPost')->name('insert.word.delete.post');
    Route::get('sentence/{word}','InsertController@deleteSentenceGet')->name('insert.sentence.delete.get');
});
# delete routes ...
//multi
Route::group(['prefix'=>'multi'],function(){
    Route::get('word','InsertController@insertMultiWordGet')->name('insert.multi.word');
    Route::get('sentence','InsertController@insertMultiSentenceGet')->name('insert.multi.sentence');
    Route::post('word','InsertController@insertMultiWordPost')->name('insert.multi.word.post');
    Route::post('sentence','InsertController@insertMultiSentencePost')->name('insert.multi.sentence.post');
});
