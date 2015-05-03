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
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    /**
     * One to many relationship with the clients
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients(){
        return $this->hasMany('App\Client');
    }

    /**
     * One to many relationships with the school's owner
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schools(){
        return $this->hasMany('App\School');
    }

    /**
     * One to many relationship between the user and the administrators
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function administrators(){
        return $this->hasMany('App\Administrator');
    }

    /**
     * One to many relationship with the mail model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mail(){
        return $this->hasMany('App\Mail');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }
    
}
