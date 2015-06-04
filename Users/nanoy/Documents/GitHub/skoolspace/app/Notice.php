<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

	protected $fillable = [ 'title', 'message', 'school_id', 'user_id'];

	public function group()
	{
		return $this->belongsTo('App\Group');
	}

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
