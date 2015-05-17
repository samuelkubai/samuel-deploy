<?php namespace App\Http\File;

use App\File;
use App\Http\Traits\Postable;

class FileRepository {

    use Postable;

    public function uploadGroupDocument($file,$location, $group, $type)
    {
        $name = $file['file']['name'];
        $tmpName = $file['file']['tmp_name'];
        $destination = 'uploads/'.$location .'/'.$name;
        if(move_uploaded_file($tmpName, $destination))
        {
            $group->documents()->create([
                'name' => $name,
                'type' => $type,
                'source' => $destination,
            ]);

            $message = 'New document: '.$name.' uploaded to '.$group->name.' Manager ';
            $this->post($message, $group);
            return true;

        } else {
            return false;
        }
    }
} 