<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Timeline\TimelineService;
use App\Http\Timeline\TimelineRepository;
use App\Http\Client\ClientRepository;


class TimelineController extends Controller {

	protected $service;

	protected $repo;

	protected $client;

	function __construct(TimelineService $service, TimelineRepository $repo, ClientRepository $client)
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
	public function index(){
	
		$title = "Events";
		$groups = $this->client->groupsForUser($this->user());
		return view('inspina.index.events', compact('title' , 'groups'));
	}

	/**
	 * Display a listing of the administrator resource.
	 *
	 * @return Response
	 */
	public function admin(){
	
		$title = "Events";
		$groups = $this->groupsForUser();
		return view('inspina.index.admin.events', compact('title' , 'groups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($school)
	{
		$events = $this->repo->eventsForSchool($school);

		return $this->service->view('inspina.timeline.admin-index', 'Timeline' , $events, $school);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request, $school)
	{
		$this->dispatch(
				/* Returns a command for the Controller to dispatch */
				$this->service->storeEventCommand($request, $school)
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
		$title = "Events";
		$events = $this->repo->eventsForSchool($school);
		return view('inspina.timeline.index', compact('events','title','school'));
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
