<?php namespace App\Http\Traits;


trait Postable {

    Public function post($message, $group, $url)
    {
        return $group->posts()->create([
            'title' => $group->name,
            'message' => $message,
            'url' => $url,
        ]);
    }

} 