<?php


Route::get('/',function(){
	return redirect('/inventory');
});
//index
Route::get('/products', 'ProductController@index');
Route::get('/categories', 'CategoryController@index');
Route::get('/locations','LocationController@index');
Route::get('/warehouses','WarehouseController@index');
Route::get('/transactions','TransactionController@index');
Route::get('/inventory','ViewController@index');

//Shows
Route::get('/inventory/{id}','ViewController@show');


//Create and Store

Route::get('/locations/create','LocationController@create');
Route::post('/locations','LocationController@store');

Route::get('/products/create', 'ProductController@create');
Route::post('/products','ProductController@store');

Route::get('/warehouses/create','WarehouseController@create');
Route::post('/warehouses','WarehouseController@store');

Route::get('/categories/create','CategoryController@create');
Route::post('/categories','CategoryController@store');

Route::get('/transactions/create','TransactionController@create');
Route::get('/transactions/internal','TransactionController@internal');
Route::get('/transactions/issue_in','TransactionController@issue_in');
Route::get('/transactions/issue_out','TransactionController@issue_out');


Route::post('/transactions','TransactionController@store');

Route::get('/physical/{id}','PhysicalInventoryController@create');
Route::post('/physical','PhysicalInventoryController@store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
