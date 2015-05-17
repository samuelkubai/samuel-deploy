<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

	protected $fillable = ['name', 'type', 'source', 'group_id'];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

}
