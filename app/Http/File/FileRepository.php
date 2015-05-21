<?php namespace App\Http\File;

use App\Http\Traits\Postable;

class FileRepository
{

    use Postable;

    protected $profileTypes = [
        'png', 'jpg'
    ];

    public function uploadGroupDocument($file, $location, $folder, $type)
    {

        $group = $folder->group()->first();
        $name = $file['file']['name'];
        $tmpName = $file['file']['tmp_name'];
        $destination = 'uploads/' . $location . '/' . $name;

        if (!move_uploaded_file($tmpName, $destination)) {
            return false;
        }

        $folder->files()->create([
            'name' => $name,
            'type' => $type,
            'source' => $destination,
        ]);

        $message = 'New document: ' . $name . ' uploaded to ' . $folder->name . ' in ' . $group->name . ' File Manager ';
        $this->post($message, $group);
        return true;

    }

    public function uploadProfilePicture($data, $request, $user)
    {
        if(($request->file('profile')->getClientSize() > 10000000))
            return false;
        if(!$this->authenticateType($request->file('profile')->getClientOriginalExtension(), $this->profileTypes))
            return false;
        $name = $data['name'];
        $tmpName = $data['tmp_name'];
        $location = 'uploads/images/profile/';
        $type = $request->file('profile')->getClientOriginalExtension();
        $destination = $location . $name;

        if (!move_uploaded_file($tmpName, $destination)) {
            return false;
        }
        $user->profile()->delete();
        $user->profile()->create([
            'name' => $name,
            'type' => $type,
            'source' => $destination
        ]);

        return true;
    }

    public function authenticateType($itemType, $allowedTypes)
    {
        foreach($allowedTypes as $type)
        {
            if((strtolower($itemType) == $type))
                return true;
        }
        return false;
    }
} 