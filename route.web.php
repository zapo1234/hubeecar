<?php

// methode insert simple
Route::get('/', 'InscriptionController@insert')->name('insert');
Route::post('/create' , 'InscriptionController@create')->name('create');



