<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Timeline\TimelineService;
use App\Http\Timeline\TimelineRepository;


class TimelineController extends Controller {

	protected $service;

	protected $repo;

	function __construct(TimelineService $service, TimelineRepository $repo)
	{
		$this->service = $service;

		$this->repo = $repo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($school){
	
		$events = $this->repo->eventsForSchool($school);

		return $this->service->view('inspina.timeline.index', 'Timeline', $events);
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
