<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        $users = User::with('roles')->get();
        $roles = Role::with('users', 'permissions')->get();
        return view('admin.home.home', compact('users', 'roles'));

    }

}
