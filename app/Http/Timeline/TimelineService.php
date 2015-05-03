<?php namespace App\Http\Timeline;

/**
* 
*/
use App\Commands\CreateEventCommand; 

class TimelineService
{
	
	function __construct()
	{
		# code...
	}

	public function storeEventCommand($request, $school)
	{
		return ( new CreateEventCommand($request, $school) );
	}


	public function view($route, $title, $events, $school = null)
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
        return view($route, compact('school', 'admin_schools','schools','clients', 'title', 'events'));
    }
}