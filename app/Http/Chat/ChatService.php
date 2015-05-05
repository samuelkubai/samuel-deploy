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

	public function sendMessage($request, $recipient, $user)
	{

		$room = $this->repo->findOrCreate($user, $recipient);

		return $this->repo->storeMessage($room, $request, $user);
	}

	public function membersOf($username)
	{
		return Client::where('username', $username)->get();
	}


	public function messagesOf($client, $recipient)
	{
		return $this->repo->messagesOf($client, $recipient);
	}


	public function view($route, $title, $members, $recipient, $messages)
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

        //dd($members);
        $schools = \Auth::user()->schools()->get();
        //dd($schools->count());
        return view($route, compact('admin_schools','schools','clients', 'title', 'messages', 'members', 'recipient'));
	}
}