<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $fillable = [ 'user_id',  'group_id', 'username', 'name', 'description', 'email'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'follows', 'group_id', 'user_id')->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany('App\Event');

    }

    public function notices()
    {
        return $this->hasMany('App\Notice');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function documents()
    {
        return $this->hasMany('App\File');
    }

    public function groupDocuments()
    {
        return $this->documents()->get();
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function profileSource()
    {
        $profile = $this->hasOne('App\Profile')->first();
        if($profile != null)

            return $profile->source;
        return 'inspina/img/profile_big.jpg';
    }
}
