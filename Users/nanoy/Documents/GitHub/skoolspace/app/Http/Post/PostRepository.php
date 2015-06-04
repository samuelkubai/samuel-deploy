<?php namespace App\Http\Post;


use App\Post;

class PostRepository {

    public function feedForUser($user, $howMany = 10)
    {
        $groupIds = $user->follows()->lists('group_id');

        return Post::whereIn('group_id', $groupIds)->latest()->simplePaginate($howMany);
    }
} 