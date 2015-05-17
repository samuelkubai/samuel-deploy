<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $fillable = ['subject', 'title', 'name', 'message', 'user_id','client_id','admin_id', 'school_id',  'role', 'class'];

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }

}
