<?php
use Illuminate\Support\Facades\Route;
Route::get('/','WordController@index')->name('home');
Route::get('/translate','WordController@translateGet')->name('translate');
Route::post('/translate-ajax','WordController@translatePost')->name('translate.ajax');
Route::post('/checkstate','WordController@checkstate')->name('checkstate');
Route::post('/get-information-word','WordController@getInformationWord')->name('get.information.word');
Route::get('/study','WordController@study')->name('study');


// Insert
Route::group(['prefix'=>'insert'],function (){
    Route::get('','InsertController@insert')->name('insert');
    Route::post('/word','InsertController@insertWord')->name('insert.word');
    Route::post('/sentence','InsertController@insertSentence')->name('insert.sentence');
    Route::post('/lesson','InsertController@insertLesson')->name('insert.lesson');
});

Route::group(['prefix'=>'tag'],function () {
    Route::get('','TagController@index')->name('tag.index');
    Route::get('/{id}','TagController@tag')->name('tag.tag');
});


Route::group(['prefix'=>'lesson'],function(){
    Route::get('','LessonController@index')->name('lesson.index');
    Route::get('/{id}','LessonController@lesson')->name('lesson.lesson');
});
