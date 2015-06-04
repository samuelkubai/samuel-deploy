<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model {

	protected $fillable = ['name', 'event_id'];

	public function messages()
	{
		return $this->hasOne('App\Chatmessage');
	}

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

}
