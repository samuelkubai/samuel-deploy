<?php namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\School;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;

class ClientController extends Controller {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The registrar implementation.
     *
     * @var Registrar
     */
    protected $registrar;

    /**
     * The redirectPath variable for the school admin page
     *
     * TEMPORARY.
     */

    protected $redirectPath = '/school/admin/1';

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        /*$this->middleware('client', ['except' => 'getLoginAndRegistration','postLogin', 'postRegister',
            'ifPatched', 'getPatchClient', 'postPatchClient']);*/
    }

    /**
     * Show the application registration form.
     *
     * @param $school
     * @return \Illuminate\Http\Response
     */
    public function getLoginAndRegistration($school)
    {
        return view('client.auth.loginAndRegistration', compact('school'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->auth->login($this->registrar->create($request->all()));

        return redirect($this->redirectPath());
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function getLogin()
    {
        return view('client.auth.login');
    }*/

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin($school, Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');


        if ($this->auth->attempt($credentials, $request->has('remember')))
        {

            if ($this->ifPatched($school)){

                return redirect( $school->username .'/');
            } else {

                return redirect($school->username.'/patch/'. \Auth::user()->id);
            }
        }



        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'These credentials do not match our records.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/stema/1';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }

    /**
     * Return the account of the admin
     * @param $school
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @internal param User $user
     */
    public function getHome($school)
    {
        return view('client.account.dashboard', compact('school'));
    }


    /**
     * @param $school
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function ifPatched($school)
    {
        $clients = Client::where('user_id',\Auth::user()->id)->get();

        $client = null;

        foreach($clients as $student)
        {
            $client = $student;
        }
        if ($client != null)
        {
            if ($client->school_id == $school->id) { return true; } else { return false; }
        } else {
            return false;
        }

    }
    public function getPatchClient()
    {
        return view('client.auth.clientPatch' );
    }

    public function postPatchClient( Requests\CreateClientRequest $request)
    {

        \Auth::user()->clients()->create($request->all());
        return redirect('/');
    }
}
