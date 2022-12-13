<?php

namespace App\Repositories\Interface;

interface PermissionRepositoryInterface


{
    public function listPermission();

    public function permissionInsert($name);

    public function permissionSelectId($id);

    public function permissionUpdateId($name, $id);

    public function permissionDelete($id);
}
