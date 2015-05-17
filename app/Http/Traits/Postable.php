<?php namespace App\Http\Traits;


trait Postable {

    Public function post($message, $group)
    {
        return $group->posts()->create([
            'title' => $group->name,
            'message' => $message,
        ]);
    }

} 