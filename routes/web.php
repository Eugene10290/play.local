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

Route::get('/','IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('blog', 'UserBlogController', ['only' => [
    'index', 'show'
]]);
Route::get('/shops','ProductController@index');
Route::get('add-to-cart/{id}','ProductController@getAddToCart');
Route::get('shopping-cart', 'ProductController@getCart');
Route::get('tags/{tags}', 'TagsController@show');
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/roles','RoleController');
    Route::resource('/users','UserController');
    Route::resource('/blog', 'BlogController')->parameters([
        'blogs' => 'blog'
    ]);

});