<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $fillable = ['subject', 'title', 'name', 'message', 'user_id','client_id','admin_id', 'school_id',  'role', 'class'];

    public function school(){
        return $this->belongsTo('App\School');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }

}
