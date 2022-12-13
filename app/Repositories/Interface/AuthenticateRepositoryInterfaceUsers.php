<?php

namespace App\Repositories\Interface;

interface AuthenticateRepositoryInterfaceUsers
{
    public function usersRegister($name, $email, $password, $avatar);

    public function usersPostchangepassword($email, $password);

    public function userUpdatePassword($email);
}

