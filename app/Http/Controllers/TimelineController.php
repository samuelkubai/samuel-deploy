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
	public function create($group)
	{
        $title = "Events";

		$events = $this->repo->eventsForGroup($group);

		return view('inspina.timeline.admin-index',compact('title' , 'events', 'group') );
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $group
     * @return Response
     */
	public function store( Request $request, $group)
	{
		$this->dispatch(
				/* Returns a command for the Controller to dispatch */
				$this->service->storeEventCommand($request, $group)
			);

		return redirect()->back();
	}

    /**
     * Display the specified resource.
     *
     * @param $group
     * @internal param $school
     * @internal param int $id
     * @return Response
     */
	public function show($group)
	{
		$title = "Events";
		$events = $this->repo->eventsForGroup($group);
        //dd($group->user()->first());
		return view('inspina.timeline.index', compact('events','title','group'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $event
     * @internal param int $id
     * @return Response
     */
	public function edit($event)
	{
        $title = 'Update Your '. $event->group()->username . ' event';
        return view('inspina.update.event', compact('title','event'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $event
     * @internal param int $id
     * @return Response
     */
	public function update(Request $request, $event)
	{
        $event->fill($request->input())->save();
        return redirect('/admin/'.$event->group()->username.'/events');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param $event
     * @internal param int $id
     * @return Response
     */
	public function destroy($event)
	{
        $event->delete();
        return redirect()->back();
	}

}
