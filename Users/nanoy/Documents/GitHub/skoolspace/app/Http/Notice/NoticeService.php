<?php namespace App\Http\Notice;

use App\Notice;

use App\School;

use App\Commands\PinNoticeCommand; 

/**
* 
*/
class NoticeService
{
	
	function __construct()
	{
		# code...
	}

	public function storeNoticeCommand($request, $school)
	{
		return ( new PinNoticeCommand($request, $school) );
	}

	public function view($route, $title, $notices, $school)
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

        
        $schools = \Auth::user()->schools()->get();
        //dd($school); 
        return view($route, compact('school','admin_schools','schools','clients', 'title', 'notices'));
    }
}