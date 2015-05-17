<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = ['title', 'group_id', 'message'];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

}
