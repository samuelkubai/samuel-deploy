<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    public function view($route, $title)
    {
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }

        //dd($client_schools);
        $schools = \Auth::user()->schools()->get();
        //dd($schools->count());
        return view($route, compact('admin_schools','schools','clients', 'title'));
    }

}
