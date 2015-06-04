<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model {

    protected $table = 'administrators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','role', 'school_id', 'user_id', 'class'];


    public function school(){
        return $this->belongsTo('App\School');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
