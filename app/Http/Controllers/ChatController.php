<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Chat\ChatService;
use App\Http\Chat\ChatRepository;


class ChatController extends Controller {


	private $repo;

	private $service;

	public function __construct(ChatRepository $repo, ChatService $service)
	{
		$this->service = $service;

		$this->repo  = $repo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($recipient)
	{
		$client = \App\Client::where('user_id', \Auth::user()->id)->first();

		$members = $this->service->membersOf($client->username);

		$messages = $this->service->messagesOf($client, $recipient);
		//dd($messages);

		return $this->service->view('inspina.chat.index', 'Chat', $members , $recipient , $messages);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request , $recipient)
	{
		$user = \Auth::user();

		$this->service->sendMessage($request, $recipient, $user);

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
