<?php namespace App\Http\Controllers;

use App\Folder;
use App\Group;
use App\Http\CLient\ClientRepository;
use App\Http\File\FileRepository;
use App\Http\File\FolderRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FileController extends Controller
{

    protected $client;

    protected $repo;
    /**
     * @var FolderRepository
     */
    private $folderRepository;

    /**
     * @param FileRepository $repo
     * @param ClientRepository $client
     * @param FolderRepository $folderRepository
     */
    function __construct(FileRepository $repo, ClientRepository $client, FolderRepository $folderRepository)
    {
        $this->repo = $repo;
        $this->client = $client;
        $this->folderRepository = $folderRepository;
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
        $allowedTypes = [
          'txt', 'pdf', 'docx', 'jpg', 'png', 'ppt', 'doc'
        ];

        $type = $request->file('file')->getClientOriginalExtension();
        $folder = Folder::find($request->folder);
        if($request->file('file')->getClientSize() > 10000000)
        {
            return redirect()->back()->with('error', 'The file must be under 10Mb in size.');
        }

        if(!$this->repo->authenticateType($request->file('file')->getClientOriginalExtension(), $allowedTypes))
            return redirect()->back()->with('error', 'This file extension is not supported.');

        $this->repo->uploadGroupDocument($_FILES, 'documents', $folder  ,$type);
		return redirect()->back()->with('success', 'File Successfully Uploaded');
	}

    /**
     * Display the specified resource.
     *
     * @param $group
     * @internal param int $id
     * @return Response
     */
	public function show($group, $folder)
	{
        $title = 'File Manager';
        $documents = $folder->files()->get();
        return view('inspina.file.manager', compact('title','group','groups', 'documents'));
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

    public function storeFolder(Request $request, $group)
    {
        $this->folderRepository->create($request->name, $group);

        return redirect()->back();
    }
}
