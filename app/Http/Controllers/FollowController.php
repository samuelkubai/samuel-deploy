<?php namespace App\Http\Controllers;

use App\Group;
use App\Http\CLient\ClientRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FollowController extends Controller {
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {

        $this->clientRepository = $clientRepository;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $title = "Your Groups";
        $groups = $this->clientRepository->groupsForUser($this->user());
        return view('inspina.index.allGroups', compact('title', 'groups'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $title = 'Join a new group';
        $groups = Group::allPaginatedGroups();
        return view('inspina.groups.search', compact('groups', 'title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($group)
	{
        $this->clientRepository->clientJoin($group, $this->user());
        return redirect($group->username);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param $group
     * @internal param int $id
     * @return Response
     */
	public function destroy($group)
	{
        $this->clientRepository->clientLeave($group, $this->user());
        return redirect('/mygroups');
	}

}
