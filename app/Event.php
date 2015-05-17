<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $fillable =['title', 'description', 'category', 'date', 'school_id'];

	public function group(){

		return $this->belongsTo('App\Group')->first();
	}

}
