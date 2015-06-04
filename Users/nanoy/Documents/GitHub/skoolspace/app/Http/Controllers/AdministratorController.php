<?php namespace App\Http\Controllers;

use App\Administrator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdministratorRequest;
use App\School;
use App\User;
use Auth;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;


class AdministratorController extends Controller {

    protected $school;
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



    /**
     * Create a new authentication controller instance.
     *
     * @param Guard|\Illuminate\Contracts\Auth\Guard $auth
     * @param Registrar|\Illuminate\Contracts\Auth\Registrar $registrar
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        //$this->middleware('guest', ['except' => 'getLogout, getHome']);
    }

    /**
     * Show the application registration form.
     *
     * @param $school
     * @return \Illuminate\Http\Response
     */
    public function getLogin($school)
    {
        return view('admin.auth.loginAndRegistration' , compact('school'));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
    }
    /**
     * Handle a registration request for the application.
     *
     * @param $school
     * @param CreateAdministratorRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister($school, CreateAdministratorRequest $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }


        $data = $request->all();
        $user = User::where('email', $request->email)->where('password', bcrypt($request->password))->first();


        if($user!=null){
            if (Administrator::where('user_id', $user->id)->first())
            {
                return redirect( $school->username)
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => 'Administrator already exists.',
                    ]);
            } else {
                Administrator::create([
                    'name' => $data['name'],
                    'class' => $data['class'],
                    'role' => $data['role'],
                    'user_id' => $user->id,
                    'school_id' => $school->id,
                ]);
                return redirect($school->username);
            }
        }else{
            return redirect($school->username)
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => $this->getFailedLoginMessage(),
                ]);
        }



    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister($school)
    {
        $admins = $school->administrators()->get();
        $schools = \Auth::user()->schools()->get();
        //dd(\Auth::user()  );
        return view('school.account.admins' , compact('admins', 'school', 'schools'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param $school
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin($school ,Request $request)
    {
        $this->school = $school;

        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            if ($this->ifRegistered($this->school)) {
                /** @var School $school */
                return redirect()->intended($this->redirectPath($school));
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
        return 'The administrator does not have a skoolspace account.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/login');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath($school)
    {
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : $school->username .'/admin';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : $this->school->username.'/admin/login';
    }

    /**
     * @param $school
     * @return bool
     */
    public function ifRegistered($school)
    {
        $admin = Administrator::where('user_id',\Auth::user()->id)->first();

        if ($admin != null)
        {
            if ($admin->school_id == $school->id) { return true; } else { return false; }

        } else {
            return false;
        }

    }
    /**
     * @param $school
     * @return \Illuminate\View\View
     */
    public function home($school)
    {
        return view('admin.account.dashboard' , compact('school'));
    }

    public function deleteAdministrator($admin)
    {
        $admin->delete();
        return redirect('/schools');
    }

    public function updateAdministrator($admin, Request $request)
    {
        $admin->fill($request->input())->save();
        return redirect()->back();
    }
}
