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
Route::get('/tagsRequest', function () {
    if(Request::ajax()){
        return "все норм";
    }
});
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/roles','RoleController');
    Route::resource('/users','UserController');
    Route::resource('/blog', 'BlogController')->parameters([
        'blogs' => 'blog'
    ]);

});