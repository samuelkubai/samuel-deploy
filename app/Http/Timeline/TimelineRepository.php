<?php namespace App\Http\Timeline;

/**
* 
*/
use App\Chatroom;
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

	public function createEvent($request, $group, $user)
	{

		$event = $group->events()->create(
			[
				'title' => $request->title,
				'description' => $request->description,
				'date' => $request->date,
				'sponsor' => $request->sponsor,
				'folder_id' => $this->createEventFolder($group, $request->title)->id,
				'category' => 'fa-briefcase',
                'status' => '1',
			]
		);
        $room = $this->createEventRoom($event);

        $event->chatroom_id = $room->id;
        $event->save();
        $this->markAsAttending($event, $user);
        $message =  'A new Event was created on ' .$group->name . ' Titled: ' . $request->title ;
        $url = $event->id.'/events/profile';
        $this->post($message , $group, $url);
        return $event;
	}

	public function eventsForGroup($group, $howMany = 10)
	{
		return Event::where('group_id', $group->id)->orderBy('date', 'desc')->paginate($howMany);
	}

    public function createEventFolder($group,$title)
    {
        return $group->folders()->create([
            'name'=> 'Event:- ' . $title,
        ]);
    }

    public function createEventRoom($event)
    {
        return $event->room()->create([
            'name' => $event->title,
        ]);
    }

    public function markAsAttending($event, $user)
    {
        $event->attending()->attach($user->id);
    }

    public function markAsNotAttending($event, $user)
    {
        $event->attending()->detach($user->id);
    }

    public function storeMessage($message, $event)
    {
        if($event->room()->first() == null)
            Chatroom::create(['name' => $event->title, 'event_id' => $event->id]);
        return $event->room()->first()->messages()->create([
            'message' => $message,
            'user_id' => \Auth::user()->id,
        ]);
    }

    public function updateEvent($event, $request)
    {
        return $event->fill([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'sponsor' => $request->sponsor,
            'status' => ($request->status == 'on')? '1' : '0',
        ])->save();

    }

    public function searchedEvents($group, $value)
    {
       return $group->events()->searchFor('title', $value)->paginate(10);
    }
}