<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        DB::table('users')->delete();
        //Создание роли Администратора
        $role = [
             'name' => 'admin',
             'display_name' => 'Администратор',
             'description' => 'Полный доступ'
        ];
         $role = Role::create($role);
         //Добавление всех прав для роли
        $permission = Permission::get();
        foreach ($permission as $key => $value) {
            $role->attachPermission($value);
        }
        //Создание админ-пользователя
        $user = [
            'name' => 'Администратор',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ];
        $user = User::create($user);
        //Применение роли к пользователю
        $user->attachRole($role);

    }
}
