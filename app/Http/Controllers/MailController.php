<?php namespace App\Http\Controllers;

use App\Client;
use App\Commands\SendMailCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SendClientMailRequest;
use App\Http\Requests\SendSchoolMailRequest;
use App\Mail;
use App\School;
use App\User;
use Illuminate\Http\Request;
use App\Http\Mail\MailRepository;

class MailController extends Controller
{

    private $repo;

    function __construct(MailRepository $repo)
    {
        $this->repo = $repo;
    }
/*___________________________________________________________________________________________________________*/

    /* School Content */


    public function getSchoolTrash($school)
    {
        $title = "Trash";
        $mails = $this->repo->myTrash($this->repo->owner_role, $school, 0, $this->user());
        $path = $school->username . "/mail/trash/";
        $schools =$this->repo->schoolsForUser($this->user());
        return view('school.account.email.inbox', compact('school','schools','title', 'mails', 'path'));
    }

    public function getSchoolMessageTrash($school, $mail)
    {
        $title = "Trash";
        $schools = $this->repo->schoolsForUser($this->user());
        return view('school.account.email.trash_message', compact('schools', 'title','mail', 'admin','school'));
    
    }
    public function markInboxTrash($school ,$mail)
    {
        $this->repo->markRecievedAsTrash($mail);
        return redirect()->back()
                        ->withErrors([
                        'success' => 'The Message Was Trashed!',
                    ]);
    }

    public function markSentTrash($school, $mail)
    {
        $this->repo->markSentAsTrash($mail);
        return redirect()->back()
                        ->withErrors([
                        'success' => 'The Message Was Trashed!',
                    ]);
    }

     /**
     * Retrieves the school's compose mail view
     * @param $school
     * @return \Illuminate\View\View
     */
    public function getSchoolSend($school)
    {
        $title = "Compose";
        $schools = $this->repo->schoolsForUser($this->user());
        return view('school.account.email.compose', compact('title','schools', 'school'));
    }

    /**
     * Persists the mail request from the school administrator
     * @param SendSchoolMailRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postSchoolSend($school ,SendSchoolMailRequest $request)
    {
        $this->dispatch($this->repo->sendToClient($request, $school, $this->user()));
        return redirect($school->username .'/mail')
                        ->withErrors([
                        'success' => 'Your message was sent!',
                    ]);
    }

    /**
     * Retrieves the school's inbox
     * @param $school
     * @return \Illuminate\View\View
     */
    public function getSchoolMail($school)
    {
        $title = "Inbox";
        $mails = $this->repo->myInbox($this->repo->owner_role, $school, 0, $this->user());
        $path = $school->username . "/mail/";
        $schools =$this->repo->schoolsForUser($this->user());
        return view('school.account.email.inbox', compact('school','schools','title', 'mails', 'path'));
    }
    public function getSchoolMessageInbox( $school ,$mail)
    {
        $title = "Inbox";
        $schools = $this->repo->schoolsForUser($this->user());
        $admin = $this->repo->clientWithId($mail->user_id);
        $mail = $this->repo->markAsRead($mail);
        return view('school.account.email.inbox_message', compact('schools', 'title','mail', 'admin','school'));
    }

    public function getSchoolMessageSent( $school , $mail)
    {
        $title = "Sent";
        $schools = $this->repo->schoolsForUser($this->user());
        $admin =  $this->repo->clientWithId($mail->receiver_id);
        return view('school.account.email.sent_message', compact('schools','title', 'mail', 'admin', 'school'));
    }

    public function getSchoolSent($school)
    {
        $title = "Sent";
        $path = $school->username ."/mail/sent/";
        $mails = $this->repo->mySent($this->repo->owner_role, $school, 0, $this->user());
        $schools = $this->repo->schoolsForUser($this->user( ));
        return view('school.account.email.inbox', compact('schools','mails', 'path', 'title', 'school'));
    }


/*______________________________________________________________________________________________________*/

/*  Client Mail system  */


    public function getClientTrash($school, $client)
    {
        $title = "Trash";
        $mails = $this->repo->myTrash($this->repo->client_role ,$school, $client->id , $this->user());
        $path = $school->username . "/client/mail/trash/". $client->id."/";
        $clients = $this->repo->clientsForUser($this->user()->id);
        return view('client.account.email.inbox', compact('school','client','clients','title', 'mails', 'path'));
    }

    public function getClientMessageTrash($school, $client, $mail)
    {
        $title = "Trash";
        $clients = $this->repo->clientsForUser($this->user()->id);
        return view('client.account.email.trash_message', compact('school','clients', 'title','mail', 'admin','client'));
    
    }
    /**
     * Retrieves the inbox view of the client
     * @param $school
     * @param $client
     * @return \Illuminate\View\View
     */
    public function getClientMail($school, $client)
    {
        $title = "Inbox";
        $mails = $this->repo->myInbox( $this->repo->client_role ,$school, $client->id , $this->user());
        $path = "/".$school->username."/client/mail/" . $client->id."/";
        $clients = $this->repo->clientsForUser($this->user()->id);
        return view('client.account.email.inbox', compact('school','mails', 'path', 'title','clients','client'));
    }


    /**
     * Retrieves the compose view of the client
     * @param $school
     * @param $client
     * @return \Illuminate\View\View
     */
    public function getClientCompose($school ,$client){
        $title = "Compose";
        $clients = $this->repo->clientsForUser($this->user()->id);
        $owner = $school->user()->first();
        $admins = $this->repo->administratorsForSchool($school->id);
        return view('client.account.email.compose', compact('title','school', 'admins','client','owner','clients'));
    }


    /**
     * Receives the request from the client compose view
     * @param $school
     * @param SendClientMailRequest $request
     * @return \Illuminate\View\View
     */
    public function postClientCompose($school, $client ,SendClientMailRequest $request){
        $mail = new SendMailCommand($this->user(), $request->subject, $request->message, $request->receiver_id, $school->id, 'Client' , 2 , $this->repo->role($request->receiver_id , $school), $client->id, 0);
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
        $title = "Inbox";
        $clients = $this->repo->clientsForUser($this->user()->id);
        $admin = $this->repo->administratorWtihId($mail->user_id);
        $mail = $this->repo->markAsRead($mail);
        return view('client.account.email.inbox_message', compact('title','school', 'mail', 'admin','clients','client'));
    }

    public function getClientMessageSent($school, $client, $mail)
    {
        $title = "Sent";
        $clients = $this->repo->clientsForUser($this->user()->id);
        $admin = $this->repo->administratorWtihId($mail->receiver_id);
        return view('client.account.email.sent_message', compact('school','title', 'mail', 'admin','clients','client'));
    }

    public function getClientSent($school, $client)
    {
        $title = "Sent";
        $path = "/".$school->username."/client/mail/sent/". $client->id."/";
        $mails = $this->repo->mySent($this->repo->client_role, $school, $client->id, $this->user());
        $clients = $this->repo->clientsForUser($this->user()->id);
        return view('client.account.email.inbox', compact('school','mails', 'path', 'title','clients','client'));
    }

}
