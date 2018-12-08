<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list,role-create,role-edit,role-delete,
                         user-create,user-list,user-update,user-delete,
                         blog-create,blog-edit,blog-delete');
    }

    /**
     * Возвращает навигационную страницу админ-панели
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('dashboard');
    }
}
