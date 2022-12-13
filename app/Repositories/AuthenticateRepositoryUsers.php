<?php

namespace App\Repositories;

use App\Repositories\Interface\AuthenticateRepositoryInterfaceUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticateRepositoryUsers implements AuthenticateRepositoryInterfaceUsers
{
    public function usersRegister($name, $email, $password, $avatar)
    {
        return
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'avatar' => $avatar
            ]);
    }

    public function usersPostchangepassword($email, $password)
    {
        return
            DB::table('users')
                ->where('email', $email)
                ->update([
                    'password' => Hash::make($password),
                ]);
    }

    public function userUpdatePassword($email){
        return
            DB::table('users')
                ->where('email',$email)
                ->update([
                    'password'=> Hash::make('222')
                ]);

    }

}
