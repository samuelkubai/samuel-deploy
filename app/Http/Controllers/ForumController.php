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
    public function clientIndex($client)
    {

    }

    public function clientShow($client)
    {
        return $this->forumView('inspina.forum.index', 'Home', $client);
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






    public function adminIndex($school)
    {
        return $this->adminForumView('inspina.forum.admin.index', 'Home', $school);
    }

    public function adminChat($school, $subject)
    {
        $messages = $this->service->messages($school, $subject);

        return $this->adminForumView('inspina.forum.admin.view', 'DashBoard', $school, $subject, $messages);
    }


    public function postAdminChat(Request $request, $school, $subject)
    {

        $message = $this->service->adminPost($request, $school, $subject);

        $this->dispatch($message);

        return redirect()->back();
    }



    private function forumView($route, $title, $client, $subject=null, $messages=null )
    {

        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = Administrator::where('user_id', $user->id)->first();
        $clients = Client::where('user_id' , $user->id)->get();
        if($administrator != null)
        {
            $admin_schools = School::where('id', $administrator->school_id)->first();
        }

        //dd($client_schools);
        $schools = \Auth::user()->schools()->get();
        //dd($schools->count());
        return view($route, compact('admin_schools','schools','clients', 'title', 'client', 'subject', 'messages'));
    }

    private function adminForumView($route, $title, $school, $subject=null, $messages=null )
    {

        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = Administrator::where('user_id', $user->id)->first();
        $clients = Client::where('user_id' , $user->id)->get();
        if($administrator != null)
        {
            $admin_schools = School::where('id', $administrator->school_id)->first();
        }

        //dd($client_schools);
        $schools = \Auth::user()->schools()->get();
        //dd($schools->count());
        return view($route, compact('admin_schools','schools','clients', 'title', 'school', 'subject', 'messages'));
    }

}
