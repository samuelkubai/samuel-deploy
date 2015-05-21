<?php namespace App\Http\User;

use App\User;

class UserRepository {


    public function FindByEmail($email)
    {
        return User::where('email', $email)->first();
    }
} 