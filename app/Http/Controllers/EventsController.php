<?php namespace App\Http\Controllers;

use App\Http\CLient\ClientRepository;
use App\Http\File\FileRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateEventMessage;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\EventSearchRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Timeline\TimelineRepository;
use App\Http\Timeline\TimelineService;
use Illuminate\Http\Request;

class EventsController extends Controller {
    protected $service;
    protected $client;
    protected $repo;
    protected $fileRepository;

    /**
     * @param FileRepository $fileRepository
     * @param TimelineService $service
     * @param TimelineRepository $repo
     * @param ClientRepository $client
     * @internal param TimelineService $service
     * @internal param TimelineRepository $repo
     * @internal param ClientRepository $client
     */
    function __construct(FileRepository $fileRepository, TimelineService $service, TimelineRepository $repo, ClientRepository $client)
    {
        $this->service = $service;
        $this->client = $client;
        $this->repo = $repo;
        $this->fileRepository = $fileRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $group
     * @return Response
     */
	public function index($group)
	{
        $title = "Events";
        $events = $this->repo->eventsForGroup($group);
        return view('inspina.events.index', compact('events','title','group'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($group)
	{
		$title = 'Create Events';
        return view('inspina.events.create', compact('title', 'group'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateEventRequest $request
     * @param $group
     * @return Response
     */
	public function store(CreateEventRequest $request , $group)
	{

		$event = $this->repo->createEvent($request, $group, $this->user());
        return redirect($event->id. '/events/profile');
	}

    /**
     * Display the specified resource.
     *
     * @internal param $event
     * @internal param $group
     * @internal param int $id
     * @param $event
     * @return Response
     */
	public function show($event)
	{
        $title = 'Event:' .$event->title;
        return view('inspina.events.profile' , compact( 'event', 'title'));
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
	    $title = 'Update Event:' .$event->title;

        return view('inspina.events.update', compact('title', 'event'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEventRequest $request
     * @param $event
     * @internal param int $id
     * @return Response
     */
	public function update(UpdateEventRequest $request, $event)
	{
		$this->repo->updateEvent($event, $request);

        return redirect($event->id . '/events/profile');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param $event
     * @internal param $ievent
     * @internal param int $id
     * @return Response
     */
	public function destroy($event)
	{
        $group = $event->group()->first();
		$event->delete();
        return redirect($group->username. '/events/');
	}

    public function attend($event)
    {
        $this->repo->markAsAttending($event, $this->user());

        return redirect()->back();
    }

    public function notAttend($event)
    {
        $this->repo->markAsNotAttending($event, $this->user());

        return redirect()->back();
    }

    /**
     * @param $folder
     * @param CreateFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeFile($folder ,CreateFileRequest $request)
    {
        $allowedTypes = [
            'txt', 'pdf', 'docx', 'jpg', 'png', 'ppt', 'doc', 'jpeg', 'jpe'
        ];

        $type = $request->file('file')->getClientOriginalExtension();
        $name = $request->name;
        if($request->file('file')->getClientSize() > 10000000)
        {
            return redirect()->back()->withErrors('The file must be under 10Mb in size.');
        }

        if(!$this->fileRepository->authenticateType($type, $allowedTypes))
            return redirect()->back()->withErrors('This file extension is not supported.');

        $this->fileRepository->uploadGroupDocument($_FILES, 'documents', $folder  ,$type, $name);
        return redirect()->back();
    }

    /**
     * @param CreateEventMessage $request
     * @param $event
     * @return \Illuminate\Http\RedirectResponse
     * @internal param $CreateEventMessage $
     */
    public function storeMessage(CreateEventMessage $request, $event)
    {

        $this->repo->storeMessage($request->message, $event);

        return redirect()->back();
    }

    /**
     **Function for searching through the Events Records and returning Filtered results.
     *
     * @param EventSearchRequest|SearchRequest $request
     * @param $group
     * @return \Illuminate\View\View
     */
    public function search(SearchRequest $request, $group)
    {
        $title = "Events";

        $events = $this->repo->searchedEvents($group, $request->value);

        return view('inspina.events.index', compact('events','title','group'));
    }

}
