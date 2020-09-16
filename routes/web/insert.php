<?php

Route::get('','InsertController@insert')->name('insert');
Route::post('/word','InsertController@insertWord')->name('insert.word');
Route::post('/sentence','InsertController@insertSentence')->name('insert.sentence');
Route::post('/lesson','InsertController@insertLesson')->name('insert.lesson');
