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


	public function chatView($route, $title, $recipient)
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

       	$client = \App\Client::where('user_id', \Auth::user()->id)->first();

		$members = $this->membersOf($client->username);

		$messages = $this->messagesOf($client, $recipient);

        $schools = \Auth::user()->schools()->get();
        
        return view($route, compact('admin_schools','schools','clients', 'title', 'messages', 'members', 'recipient'));
	}

	public function homeView($route, $title, $recipient)
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
       	
		$members = $this->membersOf($recipient->username);

        $schools = \Auth::user()->schools()->get();
        
        return view($route, compact('admin_schools','schools','clients', 'title', 'messages', 'members', 'recipient'));
	}
}