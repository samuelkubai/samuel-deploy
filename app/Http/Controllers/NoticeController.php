<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateNoticeRequest;
use Illuminate\Http\Request;
use App\Http\Notice\NoticeService;
use App\Http\Notice\NoticeRepository;
use App\Http\Client\ClientRepository;



class NoticeController extends Controller {


	protected $service;

	protected $repo;

	protected $client;

	function __construct(NoticeService $service, NoticeRepository $repo, ClientRepository $client)
	{
		$this->service = $service;
		$this->client = $client;
		$this->repo = $repo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = 'Notice';
		$groups = $this->client->groupsForUser($this->user());
		return view('inspina.index.notice', compact('title', 'groups'));
	}


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNoticeRequest $request
     * @param $group
     * @return Response
     */
	public function store(CreateNoticeRequest $request, $group)
	{
		
		$this->dispatch(
				/* Returns a command for the Controller to dispatch */
				$this->service->storeNoticeCommand($request, $group)
			);

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
		$title = 'Notice Board';
		$notices = $this->repo->pinsForSchool($group);
		return view('inspina.notice.board', compact('notices','group', 'title'));
	}

    /**
     * @param $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($event)
    {
        $event->delete();
        return redirect()->back();
    }
	public function adminIndex()
	{
		$title = 'Notice';
		$groups = $this->groupsForUser();
		return view('inspina.index.admin.notice', compact('title', 'groups'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function admin($group)
    {
        $title = 'Notice Board';
        $notices = $this->repo->pinsForSchool($group);
        return view('inspina..notice.admin_board', compact('notices','group', 'title'));
    }


}
