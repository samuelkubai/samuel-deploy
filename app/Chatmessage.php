<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model {

	protected $fillable = ['chatroom_id', 'owner_id', 'message'];

	public function Chatroom()
	{
		return $this->belongsTo('App\Chatroom');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
