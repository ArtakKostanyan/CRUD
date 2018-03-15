<?php

include_once(APP_PATH . 'Base/Route.php');
include_once(APP_PATH . 'Base/View.php');

Route::set('/', 'HomeController@index');

Route::set('/create', 'HomeController@create');
Route::set('/delete', 'HomeController@destroy');
Route::set('/edit', 'HomeController@edit');
Route::set('/update', 'HomeController@update');


Route::set('/post-create', 'HomeController@store');
