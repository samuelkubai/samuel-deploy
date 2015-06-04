<?php namespace App\Http\Mail;


use App\Administrator;
use App\Client;
use App\Mail;
use App\School;
use App\User;
use App\Commands\SendMailCommand;

/**
* 
*/
class MailRepository
{
	/**
     * This are the roles that differentiate the users of skoolspace
     * since all the users can be simultaneously clients, administrators, and school owners in skoolspace
     */
    

	public $client_role = '2';
    public $admin_role = '1';
    public $owner_role = '0';


	function __construct()
	{
		
	}


    public function myTrash($role ,$school, $id, $user)
    {
        if($role == 2){
            $mails_two = Mail::where('receiver_id', $user->id)->where('trash_receiver', 1)->where('client_id', $id)->where('to', $role)->where('school_id', $school->id)->get();
        } else {
            $mails_two = Mail::where('receiver_id', $user->id)->where('trash_receiver', 1)->where('admin_id', $id)->where('to', $role)->where('school_id', $school->id)->get();
        }
        if($role == 2){
            $mails = Mail::where('user_id', $user->id)->where('trash_sender', 1)->where('client_id', $id)->where('from', $role)->where('school_id', $school->id)->get();
        } else {
            $mails = Mail::where('user_id', $user->id)->where('trash_sender', 1)->where('admin_id', $id)->where('from', $role)->where('school_id', $school->id)->get();
        }        

        $trash_mail = $mails->merge($mails_two);
        return $trash_mail;
        
    }

    public function markSentAsTrash($mail)
    {
        $mail->trash_sender = 1;
        $mail->save();
        return $mail;
    }

    public function markRecievedAsTrash($mail)
    {
        $mail->trash_receiver = 1;
        $mail->save();
        return $mail;
    }

    public function markAsRead($mail)
    {
        $mail->status = 1;
        $mail->save();
        return $mail;
    }

	public function clientWithId($id)
	{
		return Client::where('user_id', $id)->first();
	}

	public function schoolsForUser($user)
	{
		return  $user->schools()->get();
	}


	public function clientsForUser($id)
	{
		return Client::where('user_id' , $id)->get();
	}

	public function administratorWtihId($id)
	{
		return Administrator::where('user_id', $id)->first();
	}


	public function administratorsForSchool($id)
	{
		return Administrator::where('school_id', $id)->get();
	}
	 /**
     * Reusable bit of code that allows for the sending of mail to school's clients
     * @param $request
     * @param $school
     * @return mixed
     * @internal param $schoolId
     */
    public function sendToClient($request, $school, $user)
    {
        $receiver = Client::where('admNo', $request->admNo)->first();
        $admin = \App\Administrator::where('user_id', $user->id)->first();
        $mail = new SendMailCommand($user, $request->subject, $request->message, $receiver->user_id, $school->id, ($admin != null)? $admin->role : 'admin' , $this->role($user->id , $school), 2, $receiver->id, 0);
        return $mail;
    }

    /**
     * Function for acquiring mails for a specific user.
     * @param $role
     * @param $id
     * @param null $school
     * @return mixed
     * @internal param $user
     */
    public function myInbox($role ,$school, $id, $user)
    {
        
        if($role == 2){
            $mails = Mail::where('receiver_id', $user->id)->where('trash_receiver', 0)->where('client_id', $id)->where('to', $role)->where('school_id', $school->id)->get();
        } else {
            $mails = Mail::where('receiver_id', $user->id)->where('trash_receiver', 0)->where('admin_id', $id)->where('to', $role)->where('school_id', $school->id)->get();
        }
        return $mails;
    }

    public function mySent($role  ,$school, $id, $user)
    {
        if($role == 2){
            $mails = Mail::where('user_id', $user->id)->where('trash_sender', 0)->where('client_id', $id)->where('from', $role)->where('school_id', $school->id)->get();
        } else {
            $mails = Mail::where('user_id', $user->id)->where('trash_sender', 0)->where('admin_id', $id)->where('from', $role)->where('school_id', $school->id)->get();
        }        
        return $mails;
    }

    /**
     * This method is temporarily removed for testing of its purpose
     * in the app
     * Name: ownerSent
     * @params $role int
     * @return $mails Mail
     *
     *  public function ownerSent( $role)
     *  {
     *     $user = \Auth::user();
     *     $mails = $user->mail()->where('role', $role)->get();
     *     return $mails;
     *  }
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
}