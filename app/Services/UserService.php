<?php

namespace App\Services;
use App\Models\User;

class UserService
{
    public function storeUser(string $userName, string $userEmail, string $userPhone) :User
    {
       return User::create(['name'=>$userName, 'email'=>$userEmail, 'phone_number'=>$userPhone]);
    }
}
