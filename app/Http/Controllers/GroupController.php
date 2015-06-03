<?php namespace App\Http\Controllers;

use App\Http\Client\ClientRepository;
use App\Http\File\FileRepository;
use App\Http\Group\GroupRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateSchoolRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Http\User\UserRepository;
use App\User;
use Illuminate\Http\Request;


class GroupController extends Controller {

    protected $clientRepo;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ClientRepository|GroupRepository
     */
    private $repo;
    /**
     * @var FileRepository
     */
    private $fileRepository;


    /**
     * @param ClientRepository $clientRepository
     * @param FileRepository $fileRepository
     * @param UserRepository $userRepository
     * @param ClientRepository|GroupRepository $repo
     */
    function __construct(ClientRepository $clientRepository,FileRepository $fileRepository, UserRepository $userRepository, GroupRepository $repo)
    {
        $this->clientRepo = $clientRepository;
        $this->userRepository = $userRepository;
        $this->repo = $repo;
        $this->fileRepository = $fileRepository;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $title = "Groups";
        $groups = $this->groupsForUser();

        return view('school.inspina.schools', compact('title', 'groups'));
	}

	/**
	 * Show the form for creating a new Group
	 *
	 * @return Response
	 */
	public function create()
	{
        $title = 'New Group';

        return view('school.inspina.create', compact('title'));
	}

    /**
     * Store a newly created groups to the database.
     *
     * @param CreateSchoolRequest $request
     * @internal param $school
     * @return Response
     */
	public function store(CreateSchoolRequest $request)
	{

        $user = $this->user();
        $group = $user->groups()->create($request->all());
        $this->clientRepo->clientJoin($group, $user);
        flash()->success('You have successfully created a new group');
        return redirect($group->username);
	}

    /**
     * Display the specified resource.
     *
     * @param $group
     * @internal param int $id
     * @return Response
     */
	public function show($group)
	{
        $title = $group->name;

        return view('inspina.groups.feed' , compact('title','group'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $group
     * @internal param int $id
     * @return Response
     */
	public function edit($group)
	{
        $title = $group->name;
        return view('inspina.update.school', compact('title', 'group'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupRequest|Request $request
     * @param $group
     * @internal param int $id
     * @return Response
     */
	public function update(UpdateGroupRequest $request, $group)
	{
        if ($request->file('profile') != null)
        {
            $name = $_FILES['profile']['name'];
            $tmpName = $_FILES['profile']['tmp_name'];
            $location = 'uploads/images/profile/';
            $type = $request->file('profile')->getClientOriginalExtension();
            $rand = $this->fileRepository->randomFileName();

            $destination = $location . $rand . '.' . $type;

            if (move_uploaded_file($tmpName, $destination)) {

                $group->fill($request->input())->save();
                $group->profile()->delete();
                $group->profile()->create([
                    'name' => $name,
                    'type' => $type,
                    'source' => $destination
                ]);

                return redirect($group->username)->with('success', 'Profile successfully updated');
            }
            return redirect($group->username)->with('error', 'File has not been uploaded');
        }
        $group->fill($request->input())->save();
        flash()->success('You have successfully updated your group');
        return redirect($group->username);
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
        $group->delete();
        flash()->success('You have successfully destroyed your group');
        return redirect('/');
	}

    public function  allGroups()
    {
        $title = "Your Groups";
        $groups = $this->clientRepo->groupsForUser($this->user());
        return view('inspina.index.allGroups', compact('title', 'groups'));
    }

    /**
     * @param $group
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAdministrator($group, Request $request)
    {
        $user = $this->userRepository->FindByEmail($request->email);

        #Checks whether the user is a member of skoolspace
        if(!$user)
            return redirect()->back()->withErrors('This is not a member of skoolspace');

        #Checks whether the user is a member of the groups
        if(!$this->repo->isFollowerOf($group, $user))
            return redirect()->back()->withErrors('This is not a member of '. $group->name);

        #Changes the administrator to the new user.
        $group->user_id = $user->id;
        $group->save();
        flash()->success('You have successfully changed the group administrator to '.$user->fullName());
        return redirect($group->username);
    }

    /**
     * * Function for searching through the group records
     * @param SearchRequest $request
     */

}
