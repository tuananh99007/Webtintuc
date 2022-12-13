<?php

namespace App\Repositories\Interface;

interface RoleRepositoryInterface


{
    public function roleList();

    public function roleInsertName($name);

    public function roleSelectName($name);

    public function rolePermissionInsert($roleName, $permission);

    public function roleId($id);

    public function rolePermissionId($id);

    public function roleUpdate($name, $id);

    public function rolePermissionDelete($id);

    public function rolePermissionUpdate($id, $permission_id);

    public function roleDelete($id);
}
