<?php namespace App\Http\Group;

use App\Group;

class GroupRepository {
    /**
     * @var Group
     */
    private $group;

    /**
     * @param Group $group
     */
    public function __construct(Group $group)
    {

        $this->group = $group;
    }

    public function isFollowerOf($group, $user)
    {
        $followerIds = $group->followers()->lists('user_id');

        foreach($followerIds as $follower)
        {
            if($user->id == $follower)
                return true;
        }

        return false;
    }
} 