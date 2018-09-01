<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Role;
use App\Permission;
use DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-create',
            ['only' => ['create', 'store']]);
        $this->middleware('permission:role-list',
            ['only' => ['index', 'show']]);
        $this->middleware('permission:role-update',
            ['only' => ['edit', 'update',]]);
        $this->middleware('permission:role-delete',
            ['only'=> ['delete']]);
    }

    /**
     * Отображение списка ролей
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
		$roles = Role::orderBy('id', 'DESC')->paginate(5);

		return view('roles.index', compact('roles'));
            //->with('i', ($request->input('page',1)-1)*5);
	}
    /**
     * Отображение информации о данной роли и списке её прав
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function show($id) {
        $role = Role::find($id);

        $permissions = Permission::join('permission_role', 'permission_role.permission_id', '=','permissions.id')
            ->where('permission_role.role_id', $id)
            ->get();

        return view('roles.show', compact('role','permissions'));
    }
    /**
     * Отображение формы для создания роли
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
	    $permissions = Permission::pluck('id','display_name');

	    return view('roles.create',compact('permissions'));
    }
    /**
     * Отображение формы для редактирования прав для роли
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
	    $role = Role::find($id);
	    $permissions = Permission::get();
        //Получаем id всех прав пренадлежащих пользователю в виде массива
	    $rolePermissions = DB::table('permission_role')
            ->where('role_id', $id)
            ->pluck('permission_id')
            ->toArray();

	    return view('roles.edit', compact('role','permissions','rolePermissions'));
    }
    /**
     * Создание роли и примерение прав
     *
     * @param StoreRoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRoleRequest $request) {
        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
        foreach ($request->input('permissions') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index')
            ->with('success','Role created successfully');
    }
    /**
     * Обновление роли
     *
     * @param UpdateRoleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleRequest $request, $id){
        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
        //удаление старых прав
        DB::table('permission_role')->where('role_id', $id)->delete();
        //Применение новых прав к роли
        foreach ($request->input('permissions') as $key => $value){
            $role->attachPermission($value);
        }

        return redirect()->route('roles.index');
    }
    /**
     * Удаление роли
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        DB::table('roles')->where('id', $id)->delete();

        return redirect()->route('roles.index')
            ->with('success','Role deleted successfully');

    }
}
