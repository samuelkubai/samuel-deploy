<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model {

    protected $fillable = ['name', 'group_id','folder_id', 'sub-directory'];

    public function files()
    {
        return $this->hasMany('App\File');
    }
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function folders()
    {
        return $this->hasMany('App\Folder');
    }

    public function event()
    {
        return $this->hasMany('App\Event');
    }

    public function isSubFolder()
    {
        if($this->folder_id  != null)
            return true;
        return false;
    }


}
