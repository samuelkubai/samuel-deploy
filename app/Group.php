<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
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

    public function followersCount()
    {
        return $this->followers()->get()->count();
    }
    public function isFollowedBy($user)
    {
        $followersId = $this->followers()->lists('user_id');

        foreach($followersId as $followerId)
        {
            if($user->id == $followerId)
            {
                return true;
            }
        }

        return false;
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

    public function folders()
    {
        return $this->hasMany('App\Folder');
    }

    public function isOwner($user)
    {
        if($this->user()->first()->id == $user->id)
            return true;
        return false;
    }

    public function paginatedPosts($howMany = 10)
    {
        return Post::where('group_id', $this->id)->latest()->simplePaginate();
    }
}
