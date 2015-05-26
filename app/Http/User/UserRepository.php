<?php namespace App\Http\User;

use App\User;

class UserRepository {


    public function FindByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function isAMemberOf($group, $user)
    {
        foreach($user->followedGroups() as $followedGroups)
        {
            if($group->id == $followedGroups->id)
            {
                return true;
            }
        }

        return false;
    }
} 