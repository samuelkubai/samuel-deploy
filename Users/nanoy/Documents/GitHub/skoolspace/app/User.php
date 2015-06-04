<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'firstName', 'lastName', 'telNumber', 'code', 'active'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function notices()
    {
        return $this->hasMany('App\Notice');
    }

    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function userGroups()
    {
        return $this->groups()->get();
    }


    public function messages(){
        return $this->hasMany('App\Message');
    }
    
    public function follows()
    {
        return $this->belongsToMany('App\Group', 'follows', 'user_id', 'group_id')->withTimestamps();
    }

    public function followedGroups()
    {
        return $this->follows()->get();
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

        return 'uploads/images/default/prof5.png';
    }

    public function attend()
    {
        return $this->belongsToMany('App\Event', 'attendances', 'user_id', 'event_id')->withTimestamps();
    }

    public function fullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
