<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function admin($school)
	{
		$title = 'Notice Board';
		$notices = $this->repo->pinsForSchool($school);
		return view('inspina..notice.admin_board', compact('notices','school', 'title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $school)
	{
		
		$this->dispatch(
				/* Returns a command for the Controller to dispatch */
				$this->service->storeNoticeCommand($request, $school)
			);

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($school)
	{
		$title = 'Notice Board';
		$notices = $this->repo->pinsForSchool($school);
		return view('inspina..notice.board', compact('notices','school', 'title'));
	}

	public function adminIndex()
	{
		$title = 'Notice';
		$groups = $this->groupsForUser();
		return view('inspina.index.admin.notice', compact('title', 'groups'));
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
