<?php namespace App\Http\Controllers;

use App\Group;
use App\Http\CLient\ClientRepository;
use App\Http\Group\GroupRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;

class FollowController extends Controller {
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var GroupRepository
     */
    private $groupRepository;

    /**
     * @param ClientRepository $clientRepository
     * @param GroupRepository $groupRepository
     */
    public function __construct(ClientRepository $clientRepository, GroupRepository $groupRepository)
    {

        $this->clientRepository = $clientRepository;
        $this->groupRepository = $groupRepository;
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
        $tagline = "Join a New Group";
        return view('inspina.groups.search', compact('groups', 'title', 'tagline'));
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

    /**
     * * Funtion for searching through the group records.
     * @param SearchRequest $request
     * @return \Illuminate\View\View
     */
    public function search(SearchRequest $request)
    {
        $title = 'Join a new group';
        $groups = $this->groupRepository->searchedGroups($request->value);
        $tagline = 'Results('.$groups->count().') for "'.$request->value.'"';
        return view('inspina.groups.search', compact('groups', 'title', 'tagline'));
    }

}
