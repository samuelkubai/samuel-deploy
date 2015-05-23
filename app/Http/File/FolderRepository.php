<?php namespace App\Http\File;


use App\Folder;
use App\Http\Traits\Postable;

class FolderRepository {
    use Postable;

    public function create($name, $group)
    {
        $folder = $group->folders()->create([
            'name' => $name
        ]);

        $message = 'New Folder: ' . $name . ' created in ' . $group->name ;
        $url = '/manager/'.$group->username.'/'.$folder->id;
        $this->post($message, $group, $url);

        return $folder;
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