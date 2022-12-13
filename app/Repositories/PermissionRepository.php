<?php

namespace App\Repositories;


use App\Repositories\Interface\PermissionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function listPermission()
    {
        return
            DB::table('permissions')
                ->select('*')
                ->paginate(10);
    }

    public function permissionInsert($name)
    {
        return
            DB::table('permissions')
                ->insert([
                    'name' => $name,
                ]);
    }

    public function permissionSelectId($id)
    {
        return
            DB::table('permissions')
                ->select('*')
                ->where('id', $id)
                ->first();
    }

    public function permissionUpdateId($name, $id)
    {
        return
            DB::table('permissions')
                ->where('id', $id)
                ->update([
                    'name' => $name
                ]);
    }

    public function permissionDelete($id)
    {
        return
            DB::table('permissions')
                ->where('id', $id)
                ->delete();
    }


}
