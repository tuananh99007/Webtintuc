<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Users;
use App\Repositories\Interface\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    private $permission;
    private $roleRepository;

    public function __construct(Permission $inputpermission, RoleRepositoryInterface $inputroleRepository)
    {
        $this->permission = $inputpermission;
        $this->roleRepository = $inputroleRepository;
    }

    public function list()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('list_role');
        if (!$check) {
            abort(403);
        }
        $roles = $this->roleRepository->roleList();
        return view('admin.role.list', compact('roles'));
    }

    public function add()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('add_role');
        if (!$check) {
            abort(403);
        }
        $perenList = $this->permission->where('perent_id', 0)->get();
        return view('admin.role.add', compact('perenList'));
    }

    public function postadd(Request $request)
    {
        $this->validateName($request);
        $name = $request->input('name', null);
        $permissions_id = $request->input('permission_id', null);
        $this->roleRepository->roleInsertName($name);
        $roleName = $this->roleRepository->roleSelectName($name);
        if (!empty($permissions_id) == true) {
            foreach ($permissions_id as $index => $permission) {
                $this->roleRepository->rolePermissionInsert($roleName, $permission);
            }
        }
        return redirect()->back()->withInput();
    }

    private function validateName($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
        ]);
    }

    public function update(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('update_role');
        if (!$check) {
            abort(403);
        }
        $perenList = $this->permission->where('perent_id', 0)->get();
        $id = $request->input('id', null);
        $roleUpdate = $this->roleRepository->roleId($id);
        $rolePermission = $this->roleRepository->rolePermissionId($id);
        return view('admin.role.update', compact('roleUpdate', 'perenList', 'rolePermission'));
    }

    public function postupdate(Request $request)
    {
        $this->validateName($request);
        $id = $request->input('id', null);
        $name = $request->input('name', null);
        $permissions_id = $request->input('permission_id', null);
        $this->roleRepository->roleUpdate($name, $id);
        $this->roleRepository->rolePermissionDelete($id);
        if ($permissions_id != null) {
            foreach ($permissions_id as $index => $permission_id)
                $this->roleRepository->rolePermissionUpdate($id, $permission_id);
        }
        return redirect()->back()->withInput();
    }

    public function delete(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('delete_role');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->roleRepository->rolePermissionDelete($id);
        $this->roleRepository->roleDelete($id);
        return redirect()->back()->withInput();
    }

}
