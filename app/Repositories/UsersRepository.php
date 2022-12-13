<?php

namespace App\Repositories;

use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersRepository implements UsersRepositoryInterface
{


    public function usersListAdmin()
    {
        return
            DB::table('users')
                ->select('*')
                ->where('is_deleted', 0)
                ->paginate(10);
    }

    public function usersListUsers()
    {
        return
            DB::table('users')->select('*')
                ->where('is_deleted', 0)
                ->paginate(10);
    }

    public function usersEmail($email)
    {
        return
            DB::table('users')
                ->where('email', $email)
                ->first();
    }

    public function usersInsert($name, $email, $password, $avatar)
    {
        return
            DB::table('users')
                ->insert([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'avatar' => $avatar,
                ]);
    }

    public function userId($id)
    {
        return
            DB::table('users')
                ->where('id', $id)
                ->first();
    }

    public function userUpdate($id, $name, $email, $password, $urlAvatar)
    {
        return
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'avatar' => $urlAvatar,
                ]);
    }

    public function userDelete($id)
    {
        return
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'is_deleted' => 1
                ]);
    }

    public function usersDetailBin()
    {
        return
            DB::table('users')
                ->select('*')
                ->where('is_deleted', 1)
                ->paginate(10);
    }

    public function usersRestore($id)
    {
        return
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'is_deleted' => 0
                ]);
    }

    public function usersRestoreAll()
    {
        return
            DB::table('users')
                ->where('is_deleted', 1)
                ->update([
                    'is_deleted' => 0
                ]);
    }

    public function usersPermanentlyDeleted($id)
    {
        return
            DB::table('users')
                ->where('id', $id)
                ->delete();
    }

    public function userRoleInsert($usersEmail, $role_id)
    {
        return
            DB::table('user_role')
                ->insert([
                    'user_id' => $usersEmail->id,
                    'role_id' => $role_id
                ]);
    }

    public function userRoleUserID($id)
    {
        return
            DB::table('user_role')
                ->select('role_id')
                ->where('user_id', $id)
                ->pluck('role_id')
                ->toArray();
    }

    public function userRoleDelete($id)
    {
        return
            DB::table('user_role')
                ->where('user_id', $id)
                ->delete();
    }

    public function userRoleInsertUpdate($id, $role_id)
    {
        return
            DB::table('user_role')
                ->where('user_id', $id)
                ->insert([
                    'user_id' => $id,
                    'role_id' => $role_id,
                ]);
    }
}
