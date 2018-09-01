<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-create',
            ['only' => ['create', 'store']]);
        $this->middleware('permission:user-update',
            ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete',
            ['only' => ['destroy']]);
        $this->middleware('permission:user-list',
            ['only' => ['index','show']]);
    }

    /**
     * Отображение списка пользователей
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $users = User::orderBy('id','DESC')
            ->paginate(15);

        return view('users.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 15); //нумерация вывода
    }
    /**
     * Отображение формы создания пользователя
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $roles = Role::pluck('display_name','id');
       // dd($roles);
        return view('users.create', compact('roles'));
    }
    /**
     * Создание пользователя
     *
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function store(UserStoreRequest $request) {
        $input = $request->only('name', 'email', 'password');
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        foreach ($request->input('roles') as $key => $value){
            $user->attachRole($value);
        }

        return redirect()->route('users.index')->with('success', 'Пользователь создан успешно');
    }
    /**
     * Редактирование пользователя
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $user = User::find($id);
        $roles = Role::get();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('users.edit',compact('user','roles', 'userRoles'));
    }
    /**
     * Обновление существующего пользователя
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'roles' => 'required'
        ]);
        $input = $request->only('name', 'email', 'password');

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']); //обновление пароля
        }else{
            $input = array_except($input, 'password'); //вырезаение из массива пароля
        }

        $user = User::find($id);
        $user->update($input);
        //Удаление всех ролей пренадлежащих пользователю
        DB::table('role_user')
            ->where('user_id', $id)
            ->delete();
        //Применение обновлённых ролей к пользователю
        foreach ($request->input('roles') as $key => $value){
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
            ->with('success','Пользователь обновлён успешно');
    }
    /**
     * Просмотр пользователя
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $user = User::find($id);

        return view('users.show', compact('user'));
    }
    /**
     * Удаляет пользователя
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        User::find($id)->delete();

        return redirect()->route('users.index')->with('success','Пользователь удалён успешно');
    }
}
