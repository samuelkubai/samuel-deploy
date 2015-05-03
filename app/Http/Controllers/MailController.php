<?php namespace App\Http\Controllers;

use App\Administrator;
use App\Client;
use App\Commands\SendMailCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SendAdminMailRequest;
use App\Http\Requests\SendClientMailRequest;
use App\Http\Requests\SendSchoolMailRequest;
use App\Mail;
use App\School;
use App\User;
use Illuminate\Http\Request;

class MailController extends Controller
{

    /**
     * This are the roles that differentiate the users of skoolspace
     * since all the users can be simultaneously clients, administrators, and school owners in skoolspace
     */
    protected $client_role = '2';
    protected $admin_role = '1';
    protected $owner_role = '0';

/*___________________________________________________________________________________________________________*/

    /* School Content */

    /**
     * Persists the mail request from the school administrator
     * @param SendSchoolMailRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postSchoolSend($school ,SendSchoolMailRequest $request)
    {
        $school = School::where('id', $school->id)->first();
        $this->sendToClient($request, $school, 0);
        return redirect($school->username .'/mail');
    }


    /**
     * Retrieves the school's compose mail view
     * @param $school
     * @return \Illuminate\View\View
     */
    public function getSchoolSend($school)
    {
        $title = "Compose";
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        return view('school.account.email.compose', compact('title','schools', 'school','clients', 'client_schools','admin_schools'));
    }

    /**
     * Retrieves the school's inbox
     * @param $school
     * @return \Illuminate\View\View
     */
    public function getSchoolMail($school)
    {
        $title = "Inbox";
        $mails = $this->myInbox($this->owner_role, $school, 0);
        $path = $school->username . "/mail/";
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        return view('school.account.email.inbox', compact('school','schools','title', 'mails','clients', 'path', 'client_schools','admin_schools'));
    }
    public function getSchoolMessageInbox( $school ,$mail)
    {
        $title = "Inbox";
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        $admin = Client::where('user_id', $mail->user_id)->first();
        return view('school.account.email.inbox_message', compact('schools', 'title','mail', 'admin','clients', 'client_schools','admin_schools', 'school'));
    }

    public function getSchoolMessageSent( $school , $mail)
    {
        $title = "Sent";
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        $admin =  Client::where('user_id', $mail->receiver_id)->first();
       // dd($admin);
        return view('school.account.email.sent_message', compact('schools','title', 'mail', 'admin','clients', 'client_schools','admin_schools', 'school'));
    }

    public function getSchoolSent($school)
    {
        $title = "Sent";
        $path = $school->username ."/mail/sent/";
        $mails = $this->mySent($this->owner_role, $school, 0);
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        return view('school.account.email.inbox', compact('schools','mails', 'path', 'title','clients', 'client_schools','admin_schools', 'school'));
    }

/*________________________________________________________________________________________________________*/

/* Admin Content Here: */

    /**
     * Retrieves and presents the Admin's Inbox
     * @param $school
     * @return \Illuminate\View\View
     */
    public function getAdminMail($school)
    {
        $title = "Inbox";
        //$mails = $this->myInbox( $this->admin_role, $school);
        $path = "/".$school->username."/admin/mail/";
        return view('admin.account.email.inbox', compact('title', 'mails', 'path','school'));
    }

    /**
     * Retrieves the Admin Compose Mail Page
     * @param $school
     * @return \Illuminate\View\View
     */
    public function  getAdminCompose($school)
    {

        return view('admin.account.email.compose', compact('school'));
    }

    /**
     * @param $school
     * @return \Illuminate\View\View
     */
    public function getAdminSent($school)
    {
        $admin = Administrator::where('user_id', \Auth::user()->id)->first();
        $title = "Sent";
        $path = "/".$school->username."/admin/mail/sent/";
        $mails = $this->mySent($this->admin_role, $school, $admin->id);
        return view('admin.account.email.inbox', compact('school','mails', 'path', 'title'));
    }

    public function getAdminMessageInbox($school, $mail)
    {
        $admin = Client::where('user_id', $mail->user_id)->first();
        return view('admin.account.email.inbox_message', compact('school', 'mail', 'admin'));
    }

    public function getAdminMessageSent($school, $mail)
    {
        $client = Client::where('user_id', $mail->receiver_id)->first();
        return view('admin.account.email.sent_message', compact('school', 'mail', 'client'));
    }

    /**
     * Receive the data for admin mails and persists them
     * @param $school
     * @param SendAdminMailRequest $request
     * @return string
     */
    public function postAdminCompose($school, SendAdminMailRequest $request)
    {
        //$this->sendToClient($request, $school);
        return redirect('/'.$school->username.'/admin/mail');
    }

/*_______________________________________________________________________________________________________*/

/*  Helper Functions: sendToClient, mailFrom, myInbox, mySent, role  */
    /**
     * Reusable bit of code that allows for the sending of mail to school's clients
     * @param $request
     * @param $school
     * @return mixed
     * @internal param $schoolId
     */
    public function sendToClient($request, $school, $id)
    {
        $receiver = Client::where('admNo', $request->admNo)->first();
        $user = \Auth::user();
        $admin = \App\Administrator::where('user_id', $user->id)->first();
       // dd($admin);
        $mail = new SendMailCommand($user, $request->subject, $request->message, $receiver->user_id, $school->id, ($admin != null)? $admin->role : 'admin' , $this->role($user->id , $school), 2, $receiver->id, 0);
        return $this->dispatch($mail);
    }

    /**
     * Function for acquiring mails for a specific user.
     * @param $role
     * @param $id
     * @param null $school
     * @return mixed
     * @internal param $user
     */
    public function myInbox( $role ,$school, $id)
    {
        $user = \Auth::user();
        //dd($user);
        if($role == 2){
            $mails = Mail::where('receiver_id', $user->id)->where('client_id', $id)->where('to', $role)->where('school_id', $school->id)->get();
        } else {
            $mails = Mail::where('receiver_id', $user->id)->where('admin_id', $id)->where('to', $role)->where('school_id', $school->id)->get();
        }
        return $mails;
    }

    public function mySent($role  ,$school, $id)
    {
        $user = \Auth::user();
        if($role == 2){
            $mails = Mail::where('user_id', $user->id)->where('client_id', $id)->where('from', $role)->where('school_id', $school->id)->get();
        } else {
            $mails = Mail::where('user_id', $user->id)->where('admin_id', $id)->where('from', $role)->where('school_id', $school->id)->get();
        }        return $mails;
    }

    /**
     * This method is temporarily removed for testing of its purpose
     * in the app
     * Name: ownerSent
     * @params $role int
     * @return $mails Mail
     *
        public function ownerSent( $role)
        {
            $user = \Auth::user();
            $mails = $user->mail()->where('role', $role)->get();
            return $mails;
        }
     */

    /**
     * @param $id
     * @param $school
     * @return int
     */
    public function role($id , $school)
    {
        //dd($school);
        if($school->user_id == $id)
        {
            return 0;
        } else {
            return 1;
        }
    }

/*______________________________________________________________________________________________________*/

/*  Client Mail system  */

    /**
     * Retrieves the inbox view of the client
     * @param $school
     * @param $client
     * @return \Illuminate\View\View
     */
    public function getClientMail($school, $client)
    {
        $title = "Inbox";
        $mails = $this->myInbox( $this->client_role ,$school, $client->id );
        $path = "/".$school->username."/client/mail/" . $client->id."/";
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        return view('client.account.email.inbox', compact('school','mails', 'path', 'title', 'schools','clients','client', 'client_schools','admin_schools'));
    }

    /**
     * Retrieves the compose view of the client
     * @param $school
     * @param $client
     * @return \Illuminate\View\View
     */
    public function getClientCompose($school ,$client){
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        $owner = $school->user()->first();
        //$client = Client::where('user_id', \Auth::user()->id)->first();
        $admins = Administrator::where('school_id', $school->id)->get();
        return view('client.account.email.compose', compact('school', 'admins','client','owner', 'schools','clients', 'client_schools','admin_schools'));
    }


    /**
     * Receives the request from the client compose view
     * @param $school
     * @param SendClientMailRequest $request
     * @return \Illuminate\View\View
     */
    public function postClientCompose($school, $client ,SendClientMailRequest $request){
        $user = \Auth::user();
        $mail = new SendMailCommand($user, $request->subject, $request->message, $request->receiver_id, $school->id, 'Client' , 2 , $this->role($request->receiver_id , $school), $client->id, 0);
        $this->dispatch($mail);
        return redirect('/'.$school->username.'/client/mail/'.$client->id);
    }

    /**
     * Retrieve the view for the singular message.
     * @param $school
     * @param $mail
     * @param $client
     * @return \Illuminate\View\View
     */
    public function getClientMessageInbox($school, $client, $mail)
    {
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        $admin = Administrator::where('user_id', $mail->user_id)->first();
        return view('client.account.email.inbox_message', compact('school', 'mail', 'admin', 'schools','clients','client', 'client_schools','admin_schools'));
    }

    public function getClientMessageSent($school, $client, $mail)
    {
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        $admin = Administrator::where('user_id', $mail->receiver_id)->first();
        return view('client.account.email.sent_message', compact('school', 'mail', 'admin', 'schools','clients','client', 'client_schools','admin_schools'));
    }

    public function getClientSent($school, $client)
    {
        $title = "Sent";
        $path = "/".$school->username."/client/mail/sent/". $client->id."/";
        $mails = $this->mySent($this->client_role, $school, $client->id);
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        //$admin_schools = \App\School::where('id', $administrator->school->id )->first();
        $counter = 0;
        foreach($clients as $client)
        {
            if($counter == 0)
            {
                $client_schools = \App\School::where('id' , $client->school_id)->get()->toArray();
                // dd($client);
                $counter++;
            }else{
                $client_schools = array_merge(\App\School::where('id' , $client->school_id)->get()->toArray(), $client_schools);
                $counter++;
            }
        }
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }
        $schools = \Auth::user()->schools()->get();
        return view('client.account.email.inbox', compact('school','mails', 'path', 'title', 'schools','clients','client', 'client_schools','admin_schools'));
    }
}
