<?php namespace App\Http\Chat;


use App\Http\Chat\ChatRepository;
use App\Client;
/**
* 
*/
class ChatService
{
	
	protected $repo;

	function __construct(ChatRepository $repo)
	{
		$this->repo = $repo;
	}

	public function sendMessage($request, $recipient, $client)
	{

		$room = $this->repo->findOrCreate($client, $recipient);

		return $this->repo->storeMessage($room, $request, $client);
	}

	public function membersOf($username)
	{
		return Client::where('username', $username)->get();
	}


	public function messagesOf($client, $recipient)
	{
		return $this->repo->messagesOf($client, $recipient);
	}
}