<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateNoticeRequest;
use App\Http\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Notice\NoticeService;
use App\Http\Notice\NoticeRepository;
use App\Http\Client\ClientRepository;



class NoticeController extends Controller {


	protected $service;

	protected $repo;

	protected $client;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param NoticeService $service
     * @param NoticeRepository $repo
     * @param ClientRepository $client
     * @param UserRepository $userRepository
     */
    function __construct(NoticeService $service, NoticeRepository $repo, ClientRepository $client, UserRepository $userRepository)
	{
		$this->service = $service;
		$this->client = $client;
		$this->repo = $repo;
        $this->userRepository = $userRepository;
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

		if($this->userRepository->isAMemberOf($group, \Auth::user()))
        {
            $this->dispatch(
            /* Returns a command for the Controller to dispatch */
                $this->service->storeNoticeCommand($request, $group)
            );
            flash()->success('You have successfully pined a new notice on your group notice board');
            return redirect()->back();
        }

        return redirect()->back()->withErrors('You are not a member of this groups, You can not Pin anything here.');

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
    public function destroy($notice)
    {
        $notice->delete();
        flash()->warning('You have deleted a pin successfully');
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
        return view('inspina..notice.admin_board', compact('notices','groups', 'title'));
    }


}
