<?php

Route::get('','StudyController@index')->name('study.index');

Route::post('/get-information-word','StudyController@getInformationWord')->name('study.get.information.word');
