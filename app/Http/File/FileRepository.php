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
            $fileName = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $requestName);
            $fileName = filter_var($fileName, FILTER_SANITIZE_URL);
            $name = $fileName.'.'.$type;
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

    public function downloadFile($fileName)
    {
        ignore_user_abort(true);
        set_time_limit(0); // disable the time limit for this script

        $path = "C:\wamp\www\skoolspace\public\uploads\documents\\"; // change the path to fit your websites document structure
        $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $fileName); // simple file name validation
        $dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
        $fullPath = $path.$dl_file;

        if ($fd = fopen ($fullPath, "r")) {
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "pdf":
                    header("Content-type: application/pdf");
                    header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
                    break;
                // add more headers for other content types here
                default;
                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
                    break;
            }
            header("Content-length: $fsize");
            header("Cache-control: private"); //use this to open files directly
            while(!feof($fd)) {
                $buffer = fread($fd, 2048);
                echo $buffer;
            }
        }
        fclose ($fd);
    }
} 