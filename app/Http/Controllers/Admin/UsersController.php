<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegistAccount;
use App\Repositories\Interface\RoleRepositoryInterface;
use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class   UsersController extends Controller
{
    private $usersRepository;
    private $roleRepository;

    public function __construct(UsersRepositoryInterface $inputusersRepository,

                                RoleRepositoryInterface  $inputroleRepository
    )
    {
        $this->usersRepository = $inputusersRepository;
        $this->roleRepository = $inputroleRepository;
    }

    public function list()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('list_user');
        if (!$check) {
            abort(403);
        }
        $usersList = $this->usersRepository->usersListAdmin();
        return view('admin.users.list', compact('usersList'));
    }

    public function add()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('add_user');
        if (!$check) {
            abort(403);
        }
        $userLogin = Auth::guard('admin')->user();
        $users = $this->usersRepository->usersListAdmin();
        $roles = $this->roleRepository->roleList();
        return view('admin.users.add', compact('userLogin', 'users', 'roles'));
    }

    public function postadd(Request $request)
    {
        $this->validatePostADD($request);
        $roles_id = $request->input('role_id', null);
        $name = $request->input('name', null);
        $password = $request->input('password', null);
        $avatar = $request->file('avatar');
        if ($avatar == null) {
            $avatar = asset('assets/admin/images/avatar.webp');
        }
        $email = $request->input('email', null);
        $usersEmail = $this->usersRepository->usersEmail($email);
        if (empty($usersEmail)) {
            Mail::to($email)->send(new RegistAccount());
            $this->usersRepository->usersInsert($name, $email, $password, $avatar);
            $usersEmail = $this->usersRepository->usersEmail($email);
            foreach ($roles_id as $index => $role_id) {
                $this->usersRepository->userRoleInsert($usersEmail, $role_id);
            }
        }
        return redirect()->route('admin.users.list');
    }

    private function validatePostADD($request)
    {
        $request->validate([
            'email' => 'unique:users|min:1|max:255',
            'name' => 'required|min:1|max:255',
            'password' => 'required|confirmed|min:1|max:255',
        ]);
    }

    public function update(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('update_user');
        if (!$check) {
            abort(403);
        }
        $users = $this->usersRepository->usersListAdmin();
        $id = $request->input('id', null);
        $roles = $this->roleRepository->roleList();
        $user_role = $this->usersRepository->userRoleUserID($id);
        $userId = $this->usersRepository->userId($id);
        return view('admin.users.update', compact('userId', 'users', 'roles', 'user_role'));
    }

    public function postupdate(Request $request)
    {
        $this->validatePostUpdate($request);
        $id = $request->input('id', null);
        $userID = $this->usersRepository->userId($id);
        $name = $request->input('name', null);
        $email = $request->input('email', null);
        if ($email == null) {
            $email = $userID->email;
        }
        $password = $request->input('password', null);
        $avatar = $request->file('avatar');
        $roles_id = $request->input('role_id', null);
        if (empty($avatar) != true) {
            Storage::delete($userID->avatar);
            $nameAvatar = $avatar->hashName();
            $urlAvatar = "/upload/users/" . $nameAvatar;
            $avatar->store('upload/users');
        } else {
            $urlAvatar = $userID->avatar;
        }
        if ($password == null) {
            $password = $userID->password;
        } else {
            $password = Hash::make($password);
        }
        $this->usersRepository->userUpdate($id, $name, $email, $password, $urlAvatar);
        $this->usersRepository->userRoleDelete($id);
        if ($roles_id != null) {
            foreach ($roles_id as $index => $role_id) {
                $this->usersRepository->userRoleInsertUpdate($id, $role_id);
            }
        }
        return redirect()->back()->withInput();
    }

    private function validatePostUpdate($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'min:1|max:255|',
            'password' => 'confirmed|max:255',
        ]);
    }

    public function delete(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('delete_user');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->usersRepository->userDelete($id);
        return redirect()->route('admin.users.list');
    }

    public function detail(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('detail_user');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $userID = $this->usersRepository->userId($id);
        return view('admin.users.detail', compact('userID'));
    }

    public function detailBin()
    {
        $usersDetailBin = $this->usersRepository->usersDetailBin();
        return view('admin.users.detailBin', compact('usersDetailBin'));
    }

    public function restore(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('restore_user');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->usersRepository->usersRestore($id);
        return redirect()->route('admin.users.detailBin');
    }

    public function restoreAll()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('restoreAll_user');
        if (!$check) {
            abort(403);
        }
        $this->usersRepository->usersRestoreAll();
        return redirect()->route('admin.users.detailBin');
    }

    public function permanentlyDeleted(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('permanentlyDeleted_user');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->usersRepository->userRoleDelete($id);
        $this->usersRepository->usersPermanentlyDeleted($id);
        return redirect()->route('admin.users.detailBin');
    }

    public function profile()
    {
        $userLogin = Auth::guard('admin')->user();
        return view('admin.users.profile', compact('userLogin'));
    }
}
