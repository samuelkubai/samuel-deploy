<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $fillable =['title', 'description', 'category', 'date', 'group_id', 'sponsor', 'folder_id', 'status','chatroom_id'];

	public function group(){

		return $this->belongsTo('App\Group');
	}

    public function room(){

        return $this->hasOne('App\Chatroom');
    }

    public function folder(){

        return $this->belongsTo('App\Folder');
    }

    public function attending()
    {
        return $this->belongsToMany('App\User', 'attendances', 'event_id', 'user_id')->withTimestamps();
    }

    public function isAttendedBy($user)
    {
        $participantsId = $this->attending()->lists('user_id');

        foreach($participantsId as $participantId)
        {
            if($user->id == $participantId)
            {
                return true;
            }
        }

        return false;
    }

    public function participantsCount()
    {
        return $this->attending()->get()->count();
    }

    public function messages()
    {
        return $this->room()->first()->messages()->get();
    }

    public function scopeSearchFor($query, $field, $value)
    {
        return $query->where($field, 'LIKE', "%$value%");
    }

}
