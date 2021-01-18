<?php

// methode insert simple
Route::get('/inscription', 'InscriptionController@insert')->name('insert');
Route::post('/create' , 'InscriptionController@create')->name('create');



