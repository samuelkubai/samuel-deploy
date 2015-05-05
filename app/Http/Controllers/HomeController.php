<?php namespace App\Http\Controllers;

use App\course;

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
     * Create a new controller instance.
     *
     */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->view('inspina.home.index', 'Home');
	}

    public function admin()
    {
        return $this->view('dashboard.admin', 'DashBoard');
    }

    public function noAccount()
    {
        return $this->view('partials.inspina.oops', 'Ooops!');
    }

}
