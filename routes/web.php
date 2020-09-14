<?php

Route::get('/','WordController@index')->name('home');
Route::post('/checkstate','WordController@checkstate')->name('checkstate');
Route::post('/get-information-word','WordController@getInformationWord')->name('get.information.word');
Route::get('/study','WordController@study')->name('study');

//Word
Route::group(['prefix'=>'word'],function(){
    Route::get('','WordController@index')->name('word.index');
});

//Translate
Route::group(['prefix'=>'translate'],function(){
    Route::get('/','TranslateController@translateGet')->name('translate');
    Route::post('/ajax','TranslateController@translatePost')->name('translate.ajax');
});

//Insert
Route::group(['prefix'=>'insert'],function (){
    Route::get('','InsertController@insert')->name('insert');
    Route::post('/word','InsertController@insertWord')->name('insert.word');
    Route::post('/sentence','InsertController@insertSentence')->name('insert.sentence');
    Route::post('/lesson','InsertController@insertLesson')->name('insert.lesson');
});

//Tag
Route::group(['prefix'=>'tags'],function () {
    Route::get('','TagController@index')->name('tag.index');
    Route::get('/{tag}','TagController@tag')->name('tag.tag');
});

//Lesson
Route::group(['prefix'=>'lessons'],function () {
    Route::get('','LessonController@index')->name('lesson.index');
    Route::get('/{lesson}','LessonController@tag')->name('lesson.lesson');
});
