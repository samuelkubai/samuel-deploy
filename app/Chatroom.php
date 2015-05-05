<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model {

	protected $fillable = ['person_one', 'person_two'];

	public function messages()
	{
		return $this->hasMany('App\Chatmessage');
	}

}
