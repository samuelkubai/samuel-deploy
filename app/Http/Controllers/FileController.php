<?php namespace App\Http\Controllers;

use App\Folder;
use App\Group;
use App\Http\CLient\ClientRepository;
use App\Http\File\FileRepository;
use App\Http\File\FolderRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\CreateFolderRequest;
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
     * @param CreateFileRequestRequest|CreateFileRequest|Request $request
     * @return Response
     */
	public function store($folder ,CreateFileRequest $request)
	{
        $allowedTypes = [
          'txt', 'pdf', 'docx', 'jpg', 'png', 'ppt', 'doc'
        ];

        $type = $request->file('file')->getClientOriginalExtension();
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
        $title = 'File Manager: '.$folder->name;
        $documents = $folder->files()->get();
        return view('inspina.file.manager', compact('title','group','folder', 'documents'));
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
	public function destroy($folder, $file)
	{
        $file->delete();
		return redirect('manager/'.$folder->group()->first()->username.'/'.$folder->id);
	}

    /**
     * @param CreateFolderRequest $request
     * @param $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeFolder(CreateFolderRequest $request, $group)
    {
        $folder = $this->folderRepository->create($request->name, $group);

        return redirect('manager/'.$folder->group()->first()->username.'/'.$folder->id);
    }

    public function updateFolder($folder, CreateFolderRequest $request)
    {
        $this->folderRepository->update($request->name, $folder);

        return redirect()->back();
    }

    public function destroyFolder($folder)
    {
        $group = $folder->group()->first();
        $this->folderRepository->destroy($folder);

        return redirect($group->username);
    }
}
