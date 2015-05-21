<?php namespace App\Http\File;


class FolderRepository {

    public function create($name, $group)
    {
        return $group->folders()->create([
            'name' => $name
        ]);
    }
} 