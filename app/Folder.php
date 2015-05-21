<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model {

    protected $fillable = ['name', 'group_id'];

    public function files()
    {
        return $this->hasMany('App\File');
    }
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

}
