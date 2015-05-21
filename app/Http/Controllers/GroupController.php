<?php namespace App\Http\Controllers;

use App\Http\CLient\ClientRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateSchoolRequest;
use Illuminate\Http\Request;


class GroupController extends Controller {

    protected $clientRepo;


    /**
     * @param ClientRepository $repo
     */
    function __construct(ClientRepository $repo)
    {
        $this->clientRepo = $repo;
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
        $title = 'New School';

        return view('school.inspina.create', compact('title'));
	}

    /**
     * Store a newly created group to the database.
     *
     * @param CreateSchoolRequest $request
     * @internal param $school
     * @return Response
     */
	public function store(CreateSchoolRequest $request)
	{

        $this->user()->groups()->create($request->all());
        return redirect('/admin/groups');
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
        return view('inspina.profile.school' , compact('title','group'));
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
     * @param Request $request
     * @param $group
     * @internal param int $id
     * @return Response
     */
	public function update(Request $request, $group)
	{
        if ($request->file('profile') != null)
        {
            $name = $_FILES['profile']['name'];
            $tmpName = $_FILES['profile']['tmp_name'];
            $location = 'uploads/images/profile/';
            $type = $request->file('profile')->getClientOriginalExtension();
            $destination = $location . $name;
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
        return redirect('/admin/groups');
	}

    public function  allGroups()
    {
        $title = "Your Groups";
        $groups = $this->clientRepo->groupsForUser($this->user());
        return view('inspina.index.allGroups', compact('title', 'groups'));
    }
}
