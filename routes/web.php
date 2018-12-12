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

Route::get('/home', 'HomeController@index')->name('home'); //Удалить
Route::resource('blog', 'UserBlogController', ['only' => [
    'index', 'show'
]]);
Route::get('shops','ProductController@index');
Route::get('add-to-cart/{id}','ProductController@getAddToCart');
Route::get('reduce/{id}', 'ProductController@getReduceByOne');
Route::get('remove/{id}', 'ProductController@getRemoveItem');
Route::get('shopping-cart', 'ProductController@getCart');
Route::get('checkout', 'ProductController@getCheckout');
Route::get('status', 'ProductController@paymentStatus');
Route::get('tags/{tags}', 'TagsController@show');
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/roles','RoleController');
    Route::resource('/users','UserController');
    Route::resource('/blog', 'BlogController')->parameters([
        'blogs' => 'blog'
    ]);
    Route::resource('/notes', 'NotesController');

});
Route::group(['prefix' => 'user'], function() {
    Route::get('orders', 'ProfileController@index');
    Route::get('orders/download/{name}','ProfileController@downloadPdf');
});