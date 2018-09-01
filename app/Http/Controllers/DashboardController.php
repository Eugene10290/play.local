<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list,role-create,role-edit,role-delete,
                         user-create,user-list,user-update,user-delete,
                         blog-create,blog-edit,blog-delete');
    }

    public function index(){
        return view('dashboard');
    }
}
