<?php namespace App\Http\CLient;




use App\Client;
use App\School;

/**
* 
*/
class ClientRepository
{
	
	function __construct()
	{
		
	}

	Public function retrieveClient($school, $user)
	{
		return Client::where('username', $school->username)->where('user_id', $user->id)->first();
	}
	
	public function allGroups()
	{
		return School::all();
	}

	public function groupsForUser($user)
	{
		$clients = $this->clientsForUser($user);
		$counter = 1;
		$school = null;
		foreach ($clients as $client) {
			if($counter == 1){
				$school = School::where('username', $client->username)->get();
			}
			if ($counter != 1){
				$school->merge(School::where('username', $client->username)->get());
			}
		}
		return $school;
	}

	public function clientJoin($group, $user)
	{
		return Client::create( [
			'firstName' => $user->firstName,
			'lastName' => $user->lastName,
			'user_id' => $user->id,
			'username' => $group->username,
			] );
	}

	public function clientsForUser($user)
	{
		return Client::where('user_id', $user->id)->get();
	}


}