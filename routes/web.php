<?php
Route::get('/','WordController@index')->name('home');

//Study
Route::group(['prefix'=>'study'],function(){
    Route::get('','StudyController@index')->name('study.index');
    Route::get('/oldest','StudyController@oldest')->name('study.oldest');
    Route::get('/newest','StudyController@newest')->name('study.newest');
    Route::get('/state/true','StudyController@stateTrue')->name('study.state.true');
    Route::get('/state/false','StudyController@stateFalse')->name('study.state.false');
    Route::post('/checkstate','StudyController@checkstate')->name('study.checkstate');
    Route::post('/get-information-word','StudyController@getInformationWord')->name('study.get.information.word');
});

//Word
Route::group(['prefix'=>'word'],function(){
    Route::get('/{word}','WordController@word')->name('word.word');
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
    Route::get('/{lesson}','LessonController@lesson')->name('lesson.lesson');
});
