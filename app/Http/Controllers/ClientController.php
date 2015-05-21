<?php namespace App\Http\Controllers;

use App\Http\Client\ClientRepository;
use App\Http\File\FileRepository;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected $repo;
    /**
     * @var FileRepository
     */
    private $fileRepository;

    function __construct(ClientRepository $repo, FileRepository $fileRepository)
    {
        $this->repo = $repo;
        $this->fileRepository = $fileRepository;
    }

    public function index()
    {
        $title = "Your Groups";
        $groups = $this->repo->groupsForUser($this->user());
        return view('inspina.client.groups', compact('title', 'groups'));
    }

    public function create()
    {
        $title = "Join New Group";
        $groups = $this->repo->allGroups();
        return view('inspina.client.join', compact('title', 'groups'));
    }

    public function store($group)
    {
        $this->repo->clientJoin($group, $this->user());
        return redirect('/groups');
    }

    /**
     * Destroys the relationship between the use and group.
     * @param $group
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($group)
    {
        $this->repo->clientLeave($group, $this->user());
        return redirect('/groups');
    }

    public function show()
    {
        $title = "User Profile";
        $user = $this->user();

        return view('inspina.profile.user', compact('title', 'user'));
    }

    public function edit()
    {
        $title = 'Profile Update';
        $user = $this->user();

        return view('inspina.update.user', compact('title', 'user'));
    }

    public function update(Request $request)
    {
        $user = $this->user();
        // This checks of there's a need to upload the picture and saves the rest of the information if not.
        if ($request->file('profile') == null) {
            $user->fill([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'firstName' =>$request->firstName,
                'lastName' => $request->lastName,
                'telNumber' => $request->telNumber,
            ])->save();
            return redirect('/')->with('success', 'Profile Successfully updated');
        }

        //Uploads the prof pic and stores it in the database.
        if(!$this->fileRepository->uploadProfilePicture($_FILES['profile'], $request, $user))
            return redirect()->back()->withErrors( 'Profile Was Not Updated, Check if below 10mb or right extension.');

        //Persists the rest of the data.
        $user->fill($request->input())->save();

        return redirect('/');

    }
    /*
    protected function getFailedLoginMessage()
    {
        return 'These credentials do not match our records.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    /*
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
    /*
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
    /*
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
    /*
    public function getHome($school)
    {
        return view('client.account.dashboard', compact('school'));
    }


    /**
     * @param $school
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    /*
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
    }*/
}
