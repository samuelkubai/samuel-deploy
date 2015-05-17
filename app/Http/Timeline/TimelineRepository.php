<?php namespace App\Http\Timeline;

/**
* 
*/
use App\Event;
use App\Http\Traits\Postable;
use App\School;



class TimelineRepository
{

    use Postable;

	protected $school;
	
	function __construct(School $school)
	{
		$this->school = $school;
	}

	public function createEvent($request, $group)
	{
		$group->events()->create(
			[
				'title' => $request->title,
				'description' => $request->description,
				'date' => $request->date,
				'category' => 'fa-briefcase',
			]
		);

        $message =  'A new Event was created on ' .$group->name ;
        $this->post($message , $group);
	}

	public function eventsForGroup($group)
	{
		return Event::where('group_id', $group->id)->get();
	}
}