<?php namespace App\Http\Controllers;

use App\Group;
use App\Http\CLient\ClientRepository;
use App\Http\File\FileRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FileController extends Controller
{

    protected $client;

    protected $repo;

    /**
     * @param FileRepository $repo
     * @param ClientRepository $client
     */
    function __construct(FileRepository $repo, ClientRepository $client)
    {
        $this->repo = $repo;
        $this->client = $client;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = 'File Manager';
        $groups = $this->client->groupsForUser($this->user());
        return view('inspina.file.manager', compact('title', 'groups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$title = 'File DropZone';

        return view('inspina.file.upload', compact('title'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
        $type = $request->file('file')->getClientOriginalExtension();
        $group = Group::find($request->group);
        $this->repo->uploadGroupDocument($_FILES, 'documents', $group  ,$type);
		return redirect()->back();
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
        $title = 'File Manager';
        $documents = $group->groupDocuments();
        $groups = $this->client->groupsForUser($this->user());
        return view('inspina.file.manager', compact('title', 'groups', 'documents'));
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
