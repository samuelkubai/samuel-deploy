<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

    public $imageTypes = ['png', 'jpg', 'jpeg', 'jpe'];

	protected $fillable = ['name', 'type', 'source', 'folder_id', 'user_id','rand'];

    public function folder()
    {
        return $this->belongsTo('App\Folder');
    }

    public function isImage()
    {
        foreach ($this->imageTypes as $type) {
            if($this->type == $type)
                return true;
        }

        return false;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
