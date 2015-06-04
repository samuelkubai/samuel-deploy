<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model {


    protected $table = 'guardians';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id', 'email', 'telNumber'];


    public function client(){
        return $this->hasMany('App\Client');
    }



}
