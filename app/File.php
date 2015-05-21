<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

	protected $fillable = ['name', 'type', 'source', 'folder_id'];

    public function folder()
    {
        return $this->belongsTo('App\Folder');
    }


}
