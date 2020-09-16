<?php

Route::get('','SentenceCotroller@index')->name('sentence.index');
Route::get('/{sentence}','SentenceCotroller@sentence')->name('sentence.sentence');
