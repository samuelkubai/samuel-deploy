<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

	protected $fillable = [ 'title', 'message', 'school_id'];

	public function group()
	{
		return $this->belongsTo('App\Group');
	}

}
