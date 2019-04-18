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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

	Route::get('/locale/{locale}', function ($locale){
		Session::put('locale', $locale);
		return redirect()->back();
	})->name('locale');
    Route::get('/home', 'HomeController@index')->name('home')->middleware('checkRole', 'checkNew');
	Route::get('user/add', 'HomeController@addUser')->name('user.add');
	Route::post('home', 'HomeController@createUser')->name('user.create');
	Route::get('store/add', 'StoreController@addStore')->name('store.add');
	Route::post('store/add', 'StoreController@createStore')->name('store.create');
	Route::get('resetform', 'HomeController@resetForm')->name('form.reset');
	Route::post('/rspassword', 'HomeController@resetPassword')->name('resetpassword');
	Route::get('user/{id}/edit', 'HomeController@editUser')->name('user.edit');
	Route::put('/user/{id}', 'HomeController@updateUser')->name('user.update');
	Route::get('/export/', 'HomeController@export')->name('export');
	Route::get('user/show/{id}', 'HomeController@showUser')->name('user.show')->middleware('checkNew');
	Route::get('store/show/{id}', 'StoreController@showStore')->name('store.show');
	Route::get('/export/store/', 'StoreController@export')->name('exportStore');
	Route::get('product/add/{id}', 'ProductController@addNewProduct')->name('product.new');
	Route::post('product/add/{id}', 'ProductController@newAdd')->name('new.add');
	Route::get('product/sub/{id}', 'ProductController@subProduct')->name('product.sub');
	Route::post('product/sub/{id}', 'ProductController@updateSub')->name('update.sub');
	Route::get('product/update/{id}', 'ProductController@updateProduct')->name('product.add');
	Route::post('product/update/{id}', 'ProductController@productAdd')->name('update.product');	

