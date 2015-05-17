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

	public function storeEventCommand($request, $group)
	{
		return ( new CreateEventCommand($request, $group) );
	}

}