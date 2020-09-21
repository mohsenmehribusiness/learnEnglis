<?php

Route::get('','TagController@index')->name('tag.index');
Route::get('/{tag}','TagController@tag')->name('tag.tag');
