<?php namespace App\Http\Post;


use App\Post;

class PostRepository {

    public function feedForUser($user)
    {
        $groupIds = $user->follows()->lists('group_id');

        return Post::whereIn('group_id', $groupIds)->get();
    }
} 