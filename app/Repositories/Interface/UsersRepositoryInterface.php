<?php

namespace App\Repositories\Interface;

interface UsersRepositoryInterface


{
    public function usersListAdmin();

    public function usersListUsers();

    public function usersEmail($email);

    public function usersInsert($name, $email, $password, $avatar);

    public function userId($id);

    public function userUpdate($id, $name, $email, $password, $urlAvatar);

    public function userDelete($id);

    public function usersDetailBin();

    public function usersRestore($id);

    public function usersRestoreAll();

    public function usersPermanentlyDeleted($id);

    public function userRoleInsert($usersEmail,$role_id);

    public function userRoleUserID($id);

    public function userRoleDelete($id);

    public function userRoleInsertUpdate($id,$role_id);
}
