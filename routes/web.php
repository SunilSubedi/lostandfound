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


Route::resource('category','CategoryController');
Route::resource('sub_category','SubCategoryController');

Route::prefix('admin')->group(function(){
       Route::get('/','AdminController@index')->name('admin.dashboard');
       Route::get('/login','AdminLoginController@index')->name('admin.login'); 
       Route::post('/check','AdminLoginController@login')->name('admin.check');   
       Route::get('/logout','AdminLoginController@logout')->name('admin.logout');
});
Route::get('/userlogout','Auth\LoginController@userLogout')->name('user.logout');

Route::get('/getcategory','CategoryController@getAll');
Route::get('/sortcategory/{value}','CategoryController@sort');
Route::get('/searchcategory/{value}','CategoryController@searchCategory');
Route::get('/home', 'HomeController@index')->name('/home');


Route::get('/getsubcategory','SubCategoryController@getAll');
Route::get('/sortsubcategory/{value}','SubCategoryController@sort');

