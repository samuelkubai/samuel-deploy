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


	public function findOrCreate($client, $recipient)
	{
		$room = $this->room->where('person_one', $client->id)->where('person_two', $recipient->id)->first();

		if ($room == null) {
			$room = $this->room->where('person_two', $client->id)->where('person_one', $recipient->id)->first();
		}

		if ($room == null) {
			$room = $this->create($client, $recipient);
		}

		return $room;
	}

	public function create($client, $recipient)
	{
		return $this->room->create(
			[
				'person_one' => $client->id,
				'person_two' => $recipient->id,
			]
			);
	}

	public function messagesOf($client, $recipient)
	{
		$room = $this->findOrCreate($client, $recipient);
		
		return $this->message->where('chatroom_id', $room->id)->get();
	}

	public function storeMessage($room, $request, $client)
	{
		//dd($user);
		return $this->message->create([
			'chatroom_id' => $room->id,
			'owner_id' => $client->id,
			'message' => $request->message,
			]
			);
	}
}

