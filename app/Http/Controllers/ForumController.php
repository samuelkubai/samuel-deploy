<?php namespace App\Http\Controllers;

use App\Administrator;
use App\Client;
use App\course;
use App\Http\Forum\ForumService;
use App\Http\Forum\Subject;
use App\School;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Commands\SendMessageComand;


class ForumController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */
    /**
     * @var ForumService
     */
    private $service;

    /**
     * Create a new controller instance.
     * @param ForumService $service
     */
    public function __construct(ForumService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function clientIndex()
    {
        $title = "Forums";
        $clients = $this->clientsForUser();
        return view('inspina.forum.index', compact('clients', 'title'));
    }

    public function clientShow($client, $subject)
    {
        $title = "Forums";
        $messages = $this->service->clientMessages($client, $subject);
        return view('inspina.forum.view', compact('messages', 'title', 'client', 'subject'));
    }
    public function clientChat($client, $subject)
    {
        $messages = $this->service->clientMessages($client, $subject);

        return $this->forumView('inspina.forum.view', 'DashBoard', $client, $subject, $messages);
    }

    /**
     * @param Request $request
     * @param $client
     * @param $subject
     * @return mixed
     */
    public function postClientChat(Request $request, $client, $subject)
    {

        $message = $this->service->clientPost($request, $client, $subject);

        $this->dispatch($message);

        return redirect()->back();
    }






    public function adminIndex()
    {
        $title = "Forums";
        $schools = $this->schoolsForUser();
        return view('inspina.forum.admin.index', compact('schools', 'title'));
    }

    public function adminChat($school, $subject)
    {
        $title = "Forums";
        $messages = $this->service->messages($school, $subject);
        return view('inspina.forum.admin.view', compact('title', 'messages', 'subject', 'school'));
    }


    public function postAdminChat(Request $request, $school, $subject)
    {

        $message = $this->service->adminPost($request, $school, $subject);

        $this->dispatch($message);

        return redirect()->back();
    }

}
