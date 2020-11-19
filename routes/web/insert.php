<?php
Route::get('','InsertController@insert')->name('insert');
Route::post('word','InsertController@insertWordPost')->name('insert.word');
Route::post('sentence','InsertController@insertSentencePost')->name('insert.sentence');
// insert lesson
Route::get('lesson','InsertController@insertLessonGet')->name('insert.lesson.get');
Route::post('lesson','InsertController@insertLessonPost')->name('insert.lesson');
# edit routes ...
Route::get('lesson/edit/{lesson}','InsertController@editLessonGet')->name('insert.lesson.edit.get');//good
Route::post('lesson/edit/{lesson}','InsertController@editLessonPost')->name('insert.lesson.edit.post');//good
Route::get('tag/edit/{tag}','InsertController@editTagGet')->name('insert.tag.edit.get');
Route::post('tag/edit/{tag}','InsertController@editTagPost')->name('insert.tag.edit.post');
Route::get('word/edit/{word}','InsertController@editWordGet')->name('insert.word.edit.get');//good
Route::post('word/edit/{word}','InsertController@editWordPost')->name('insert.word.edit.post');//good
Route::get('sentence/edit/{word}','InsertController@editSentenceGet')->name('insert.sentence.edit.get');//good
Route::post('sentence/edit/{word}','InsertController@editSentencePost')->name('insert.sentence.edit.post');//good
# edit routes ...
## delete routes ...
Route::get('lesson/delete/{lesson}','InsertController@deleteLessonGet')->name('insert.lesson.delete.get');
Route::get('tag/delete/{tag}','InsertController@deleteLessonGet')->name('insert.tag.delete.get');
Route::get('word/delete/{word}','InsertController@deleteWordGet')->name('insert.word.delete.get');
Route::post('word/delete/{word}','InsertController@deleteWordPost')->name('insert.word.delete.post');
Route::get('sentence/delete/{word}','InsertController@deleteSentenceGet')->name('insert.sentence.delete.get');
# delete routes ...
//multi
Route::group(['prefix'=>'multi'],function(){
    Route::get('word','InsertController@insertMultiWordGet')->name('insert.multi.word');
    Route::get('sentence','InsertController@insertMultiSentenceGet')->name('insert.multi.sentence');
    Route::post('word','InsertController@insertMultiWordPost')->name('insert.multi.word.post');
    Route::post('sentence','InsertController@insertMultiSentencePost')->name('insert.multi.sentence.post');
});
