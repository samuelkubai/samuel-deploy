<?php namespace App\Http\CLient;




use App\Client;
use App\Group;
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

    /**
     *  Returns all the groups in the system.
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allGroups()
	{
		return Group::all();
	}

    /**
     * Returns all the groups the user has joined.
     * @param $user
     * @return mixed
     */
    public function groupsForUser($user)
	{
        $groupIds = $user->follows()->lists('group_id');

        $groups = Group::whereIn('id', $groupIds)->get();

        return $groups;
	}

	public function clientJoin($group, $user)
	{
		return $user->follows()->attach($group->id);
	}

	public function clientsForUser($user)
	{
		return Client::where('user_id', $user->id)->get();
	}

    public function clientLeave($group, $user)
    {
        $user->follows()->dettach($group->id);
    }


}