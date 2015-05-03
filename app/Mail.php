<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model {

    protected $fillable = ['subject', 'message', 'user_id','client_id','admin_id', 'receiver_id', 'school_id', 'status', 'role', 'from', 'to'];


    public function school(){
        return $this->belongsTo('App\School');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
