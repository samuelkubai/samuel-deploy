<?php namespace App\Http\Timeline;

/**
* 
*/
use App\Event;
use App\School;



class TimelineRepository
{
	protected $school;
	
	function __construct(School $school)
	{
		$this->school = $school;
	}

	public function createEvent($request, $school)
	{
		//dd($this->school);
		Event::create(
			[
				'title' => $request->title,
				'description' => $request->description,
				'date' => $request->date,
				'category' => 'fa-briefcase',
				'school_id' => $school->id,
			]
		);
	}

	public function eventsForSchool($school)
	{
		return Event::where('school_id', $school->id)->get();
	}
}