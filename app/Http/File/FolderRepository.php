<?php namespace App\Http\File;


use App\Folder;

class FolderRepository {

    public function create($name, $group)
    {
        return $group->folders()->create([
            'name' => $name
        ]);
    }

    public function update($name, $folder)
    {
        $folder->name = $name;
        $folder->save();
    }

    public function destroy($folder)
    {

        $folder->delete();

        return false;
    }
} 