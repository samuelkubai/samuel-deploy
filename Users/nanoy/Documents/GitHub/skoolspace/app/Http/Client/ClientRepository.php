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
     * @param int $howMany
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allGroups($howMany =10)
	{
		return Group::simplePaginate($howMany);
	}

    /**
     * Returns all the groups the user has joined.
     * @param $user
     * @param int $howMany
     * @return mixed
     */
    public function groupsForUser($user, $howMany = 10)
	{
        $groupIds = $user->follows()->lists('group_id');

        $groups = Group::whereIn('id', $groupIds)->simplePaginate($howMany);

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
        $user->follows()->detach($group->id);
    }


    public  function updateUser($request, $user)
    {
        $user->fill([
            'password' => ($request->password)? bcrypt($request->password):$user->password,
            'firstName' =>$request->firstName,
            'lastName' => $request->lastName,
            'telNumber' => $request->telNumber,
        ])->save();
    }
}