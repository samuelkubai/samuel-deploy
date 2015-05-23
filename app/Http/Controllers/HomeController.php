<?php namespace App\Http\Controllers;

use App\course;
use App\Http\Post\PostRepository;
use Illuminate\Http\Request;

class HomeController extends Controller {

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
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Create a new controller instance.
     * @param PostRepository $postRepository
     */
	public function __construct(PostRepository $postRepository)
	{
		//$this->middleware('auth');
        $this->postRepository = $postRepository;
    }

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $title = 'News Feed';
        $statuses = $this->postRepository->feedForUser($this->user());
        $user = $this->user();
        return view('inspina.home.feed', compact('title','user', 'statuses'));
	}

    public function admin()
    {
        return $this->view('dashboard.admin', 'DashBoard');
    }

    public function noAccount()
    {
        return $this->view('partials.inspina.oops', 'Ooops!');
    }

    public function createFile()
    {
        $title = 'File Manager';
        $message = 'Upload a file';
        return view('file', compact('title', 'message'));
    }

    public function uploadFile(Request $request)
    {
        $name = $_FILES['file']['name'];
        $tmpName = $_FILES['file']['tmp_name'];
        $location = 'uploads/';
        if(move_uploaded_file($tmpName, $location.$name))
        {
            return redirect()->back()->with('message', 'File has already been uploaded');
        } else {
            return redirect()->back()->with('message', 'File has already been uploaded');
        }

    }

}
