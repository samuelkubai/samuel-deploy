<?php namespace App\Http\Chat;


use App\Chatroom;
use App\Chatmessage;

/**
* 
*/
class ChatRepository
{
	
	protected $room;

	protected $message;


	function __construct(Chatroom $room, Chatmessage $message)
	{
		$this->room = $room;

		$this->message = $message;
	}


	public function findOrCreate($owner, $recipient)
	{
		$room = $this->room->where('person_one', $owner->id)->where('person_two', $recipient->id)->first();

		if ($room == null) {
			$room = $this->room->where('person_two', $owner->id)->where('person_one', $recipient->id)->first();
		}

		if ($room == null) {
			$room = $this->create($owner, $recipient);
		}

		return $room;
	}

	public function create($owner, $recipient)
	{
		return $this->room->create(
			[
				'person_one' => $owner->id,
				'person_two' => $recipient->id,
			]
			);
	}

	public function messagesOf($client, $recipient)
	{
		$owner = \App\User::find($client->user_id);
		$room = $this->findOrCreate($owner, $recipient);
		//dd($room);
		return $this->message->where('chatroom_id', $room->id)->get();
	}

	public function storeMessage($room, $request, $user)
	{
		//dd($user);
		return $this->message->create([
			'chatroom_id' => $room->id,
			'owner_id' => $user->id,
			'message' => $request->message,
			]
			);
	}
}

