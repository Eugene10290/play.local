<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Инфа';
	return AdminSection::view($content, 'Главная страница');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Какая-то инфа';
	return AdminSection::view($content, 'Информация');
}]);
Route::get('users', ['as' => 'admin.users', function(){
    $content = 'Список пользователей';
    return AdminSection::view($content, 'Пользователи');
}]);
Route::get('admins', ['as' => 'admin.admins', function(){
    $content = 'Администраторы сайта';
    return AdminSection::view($content, 'Управление доступом');
}]);
Route::get('news/create', ['as' => 'admin.news.create', function(){
    $content = 'Создать';
    return AdminSection::view($content, 'Создать новость');
}]);
Route::get('news/info', ['as' => 'admin.news.info', function(){
    $content = '';
    return AdminSection::view($content, 'Управление');
}]);
Route::get('shop-hist', ['as' => 'admin.shop-hist', function(){
    $content = '';
    return AdminSection::view($content, 'Покупки пользователей');
}]);
