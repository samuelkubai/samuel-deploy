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
	public function index()
	{
		$title = 'Chat';
		$clients = $this->clientsForUser();
		return view('inspina.index.chat', compact('clients', 'title'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($client ,$recipient)
	{
		$title = "Chat";
		$members = $this->service->membersOf($client->username);
		$messages = $this->service->messagesOf($client, $recipient);
		return view('inspina.chat.chat', compact('title', 'members', 'client', 'recipient', 'messages'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request $request ,$client, $recipient)
	{

		$this->service->sendMessage($request, $recipient, $client);

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($client)
	{
		$title = "Chat";
		$members = $this->service->membersOf($client->username);
		return view('inspina.chat.home', compact('title', 'client', 'members'));
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
