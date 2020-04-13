<?php

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/

	Auth::routes();

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/coas', 'CoaController@index')->name('coas');

	Route::resource('coas', 'CoaController');
	Route::get('go-home', array('as' => 'go-home', 'uses' => 'CoaController@index'));
	Route::get('go-home', array('as' => 'go-home', 'uses' => 'CoaController@index'));
//Route::get('coas/{coa}/download', array('as' => 'download', 'uses' => 'HomeController@download'));


//Route::get('/', 'HomeController@show')->name('home1');

	Route::get('/get-simple-datatables-data', 'DataTableController@getSimpleDatatablesData')->name('simple_datatables_users_data');

	Route::get('/get-custom-column-datatables-data', 'DataTableController@getCustomColumnDatatablesData')->name('custom_column_datatables_users_data');

	Route::get('/get-relationship-column-datatables-data', 'DataTableController@getRelationshipColumnDatatablesData')->name('relationship_column_datatables_users_data');

	Route::get('/get-extra-data-datatables-attributes-data', 'DataTableController@getExtraDataDatatablesAttributesData')->name('get_extra_data_datatables_attributes_data');
	Route::get('download/{id}', 'HomeController@download_regular')->name('download');
