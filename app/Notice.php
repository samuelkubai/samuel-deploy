<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

	protected $fillable = [ 'title', 'message', 'school_id'];

	public function school()
	{
		return $this->belongsTo('App\School');
	}

}
