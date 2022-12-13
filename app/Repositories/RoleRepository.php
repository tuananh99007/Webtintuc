<?php

namespace App\Repositories;


use App\Repositories\Interface\RoleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RoleRepository implements RoleRepositoryInterface
{
    public function roleList()
    {
        return DB::table('roles')->select('*')->paginate(10);
    }

    public function roleInsertName($name)
    {
        return DB::table('roles')->insert([
            'name' => $name,
        ]);
    }

    public function roleSelectName($name)
    {
        return
            DB::table('roles')
                ->select('id')
                ->where('name', $name)
                ->first();
    }

    public function rolePermissionInsert($roleName, $permission)
    {
        return
            DB::table('role_permission')
                ->insert([
                    'role_id' => $roleName->id,
                    'permission_id' => $permission,
                ]);
    }

    public function roleId($id)
    {
        return
            DB::table('roles')
                ->select('*')
                ->where('id', $id)
                ->first();

    }

    public function rolePermissionId($id)
    {
        return
            DB::table('role_permission')
                ->where('role_id', $id)
                ->get()
                ->pluck('permission_id')
                ->toArray();

    }

    public function roleUpdate($name, $id)
    {
        return
            DB::table('roles')
                ->where('id', $id)
                ->update([
                    'name' => $name
                ]);

    }

    public function rolePermissionDelete($id)
    {
        return
            DB::table('role_permission')
                ->where('role_id', $id)
                ->delete();

    }

    public function rolePermissionUpdate($id, $permission_id)
    {
        return
            DB::table('role_permission')
                ->insert([
                    'role_id' => $id,
                    'permission_id' => $permission_id
                ]);

    }

    public function roleDelete($id)
    {
        return
            DB::table('roles')
                ->where('id', $id)
                ->delete();

    }

}
