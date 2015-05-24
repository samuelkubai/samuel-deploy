<?php namespace App\Http\File;

use App\Http\Traits\Postable;

class FileRepository
{

    use Postable;

    protected $profileTypes = [
        'png', 'jpg', 'jpeg', 'jpe'
    ];

    public function uploadGroupDocument($file, $location, $folder, $type, $requestName)
    {

        $group = $folder->group()->first();
        if($requestName == null)
            $name = $file['file']['name'];
        else
            $name = $requestName.'.'.$type;
        $tmpName = $file['file']['tmp_name'];
        $destination = 'uploads/' . $location . '/' . $name;

        if (!move_uploaded_file($tmpName, $destination)) {
            return false;
        }

        $folder->files()->create([
            'name' => $name,
            'type' => $type,
            'source' => $destination,
            'user_id' => \Auth::user()->id,
        ]);

        $message = 'New document: ' . $name . ' uploaded to Folder: ' . $folder->name .' by '.$group->user()->first()->firstName.' '.$group->user()->first()->lastName. ' in Group: ' . $group->name;
        $url = '/manager/'.$group->username.'/'.$folder->id;
        $this->post($message, $group, $url);
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