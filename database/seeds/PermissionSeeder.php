<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
              'name' => 'index',
              'display_name' => 'Главная страница',
              'description' => 'Отображение главной страницы админ-панели'
            ],
            /*------Роли------*/
            [
                'name' => 'role-create',
                'display_name' => 'Создать роль',
                'description' => 'Создание новой роли'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Список ролей',
                'description' => 'Отображение списка ролей'
            ],
            [
                'name' => 'role-update',
                'display_name' => 'Обновить роль',
                'description' => 'Обновление роли'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Удалить роль',
                'description' => 'Удаление роли '
            ],
            /*------Пользователи------*/
            [
                'name' => 'user-create',
                'display_name' => 'Создание пользователя',
                'description' => 'Создание нового пользователя'
            ],
            [
                'name' => 'user-list',
                'display_name' => 'Отображение списка пользователей',
                'description' => 'Отображение списка всех пользователей'
            ],
            [
                'name' => 'user-update',
                'display_name' => 'Обновление пользователя',
                'description' => 'Обновление существующего пользователя'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Удаление пользователя',
                'description' => 'Удаление существующего пользователя'
            ],
            /*------Работа с блогом------*/
            [
                'name' => 'blog-create',
                'display_name' => 'Создание записи',
                'description' => 'Создание записи в блоге'
            ],
            [
                'name' => 'blog-edit',
                'display_name' => 'Редактирование записи',
                'description' => 'Редактирование записи в блоге'
            ],
            [
                'name' => 'blog-delete',
                'display_name' => 'Удаление записи',
                'description' => 'Удаление записи в блоге'
            ],
            /*------Работа с нотами------*/
            [
                'name' => 'note-create',
                'display_name' => 'Создание нот',
                'description' => 'Создание нот'
            ],
            [
                'name' => 'note-edit',
                'display_name' => 'Редактирование нот',
                'description' => 'Редактирование нот'
            ],
            [
                'name' => 'note-delete',
                'display_name' => 'Удаление нот',
                'description' => 'Удаление нот'
            ],

        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
