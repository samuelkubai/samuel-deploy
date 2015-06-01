<?php namespace App\Http\Controllers;

use App\Folder;
use App\Group;
use App\Http\Client\ClientRepository;
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
     * @param $folder
     * @param CreateFileRequestRequest|CreateFileRequest|Request $request
     * @return Response
     */
	public function store($folder ,CreateFileRequest $request)
	{

        $allowedTypes = [
          'txt', 'pdf', 'docx', 'jpg', 'png', 'ppt', 'doc', 'jpeg', 'jpe'
        ];

        $type = $request->file('file')->getClientOriginalExtension();
        $name = $request->name;
        if($request->file('file')->getClientSize() > 10000000)
        {
            return redirect()->back()->with('error', 'The file must be under 10Mb in size.');
        }

        if(!$this->repo->authenticateType($type, $allowedTypes))
            return redirect()->back()->with('error', 'This file extension is not supported.');

        $this->repo->uploadGroupDocument($_FILES, 'documents', $folder  ,$type, $name);
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
        $subFolders = $folder->folders()->get();

        return view('inspina.file.manager', compact('title','group','folder', 'documents', 'subFolders'));
	}

    /**
     * @internal param $file_name
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Request $request
     */
    public function download($file)
    {
        $this->repo->downloadFile($file);
       return redirect()->back();
    }
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

    public function storeSubFolder(CreateFolderRequest $request, $folder)
    {

        $this->folderRepository->createSubDirectory($folder, $request->name);

        return redirect()->back();
    }
}
