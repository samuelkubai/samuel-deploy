<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model {


    protected $table = 'schools';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description', 'username', 'email'];


    /**
     * Has a one to many relationship with the client model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients(){
        return $this->hasMany('App\Client');
    }

    /**
     * One to many relationship with the administrators model
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function administrators(){
        return $this->hasMany('App\Administrator');
    }


    /**
     * One to many relationship with the user model
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
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


    public function events(){
        
        return $this->hasMany('App\Event');
    }

    public function notices(){
        
        return $this->hasMany('App\Notice');
    }


}
