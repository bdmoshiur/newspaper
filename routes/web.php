<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('add/category','CategoryController@add')->name('add.category');




Route::get('product/index','ProductController@index')->name('product.index');
Route::get('product/create','ProductController@create')->name('product.create');
Route::post('product/store','ProductController@store')->name('product.store');
Route::get('product/show','ProductController@show')->name('product.show');
Route::get('product/edit/{id}','ProductController@edit')->name('product.edit');
Route::post('product/update/{id}','ProductController@update')->name('product.update');
Route::delete('product/destroy/{id}','ProductController@destroy')->name('product.destroy');
