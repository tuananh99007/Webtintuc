<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $inputpermissionRepository)
    {
        $this->permissionRepository = $inputpermissionRepository;
    }

    public function list()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('list_permission');
        if (!$check) {
            abort(403);
        }
        $permissionsList = $this->permissionRepository->listPermission();
        return view('admin.permission.list', compact('permissionsList'));
    }

    public function add()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('add_permission');
        if (!$check) {
            abort(403);
        }
        return view('admin.permission.add');
    }

    public function postadd(Request $request)
    {
        $this->validateName($request);
        $name = $request->input('name', null);
        $this->permissionRepository->permissionInsert($name);
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
        $check = Gate::allows('update_permission');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $permissionUpdate = $this->permissionRepository->permissionSelectId($id);
        return view('admin.permission.update', compact('permissionUpdate'));
    }

    public function postupdate(Request $request)
    {
        $this->validateName($request);
        $id = $request->input('id', null);
        $name = $request->input('name', null);
        $this->permissionRepository->permissionUpdateId($name, $id);
        return redirect()->back()->withInput();
    }

    public function delete(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('delete_permission');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->permissionRepository->permissionDelete($id);
        return redirect()->back()->withInput();
    }

}
