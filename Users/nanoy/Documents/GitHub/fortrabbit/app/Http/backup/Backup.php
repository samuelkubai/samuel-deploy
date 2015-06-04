<?php namespace App\Http\Backup;


use App\Administrator;
use App\Client;
use App\Http\Requests;
use App\Http\Requests\SendAdminMailRequest;
use App\Mail;
use App\School;
use Illuminate\Http\Request;


/**
* 
*/
class MailController
{
	
	function __construct()
	{
		echo "This is a backup file, It Should not be instantiated";
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
   

}