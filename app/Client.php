<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\School;
use App\Guardian;

class Client extends Model {

    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstName' ,'lastName', 'user_id', 'username'];


    public function school(){
        return $this->belongsTo('App\School');
    }

    public function guardian(){
        return $this->belongsTo('App\Guardian');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }
}
