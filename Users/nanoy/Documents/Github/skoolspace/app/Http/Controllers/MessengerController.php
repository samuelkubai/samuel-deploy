<?php namespace App\Http\Controllers;

use App\Administrator;
use App\Client;
use App\Commands\SendMailCommand;
use App\Commands\SendMessageComand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SendMessageRequest;
use App\Message;
use App\School;
use Illuminate\Http\Request;

class MessengerController extends Controller {

    public function getSchoolMessages($school)
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
        $post = "/".$school->username."/forum/";
        $messages = $this->messages($school, 0);
        $title = "School Space";
        return view('school.account.messenger', compact('title','user', 'schools','admin_schools','schools','clients', 'post', 'messages'));
    }

    public function postSchoolMessages( $school, SendMessageRequest $request)
    {
        $path = "/".$school->username."/forum/";
        $name = "Admin";
        $this->send($path, $request, $school, $name);
        return redirect($path);
    }
/*_________________________________________________________________________________________________*/

/* Client GET and POST routes */

    public function getClientMessages($school, $client)
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
        $post = "/".$school->username."/client/forum/".$client->id."/";
        $messages = $this->messages($school, 0);
        $client_messages = $this->messages($school, 1, $client->class);
        $title = "School Space";
       // dd($client_messages);
        return view('client.account.messenger', compact('title','client_messages','user', 'client','schools','admin_schools','school','clients', 'post', 'messages'));
    }
    public function postClientMessages($school, $client, SendMessageRequest $request)
    {
        $path = "/".$school->username."/client/forum/".$client->id."/";
        $name = $client->firstName ." ". $client->middleName;
        $this->send($request, $school, $name);
        return redirect($path);
    }



    public function postClientClassMessages($school, $client, SendMessageRequest $request)
    {
        $path = "/".$school->username."/client/forum/".$client->id."/";
        $name = $client->firstName ." ". $client->middleName;
        $this->send($request, $school, $name, $client);
        return redirect($path);
    }
/*__________________________________________________________________________________________________*/
/* Messenger Helper functions */

    public function send($request, $school, $name, $client=null)
    {
        if($client != null){
            $user = \Auth::user();
            if (isset($client->id) && isset($client->class))
            {
                $mail = new SendMessageComand($user, $name, $request->message, $school->id, $client->id , null, $client->class , 1);
                $this->dispatch($mail);
            }


        } else {
            $user = \Auth::user();
            $mail = new SendMessageComand($user, $name, $request->message, $school->id, null, 0);
            $this->dispatch($mail);

        }
        return true;
    }

    public function messages($school, $role, $class= null)
    {
        if(isset($role))
        {
            if($role == 0)
            {
               $messages = Message::where('school_id', $school->id)->where('role', $role)->get();
            } else {
                $messages = Message::where('school_id', $school->id)->where('role', $role)->where('class', $class)->get();
            }
            return $messages;
        }
        return null;
    }

}

/*
    public function getClientClassMessages($school, $client)
    {
        $user = \Auth::user();
        $admin_schools = null;
        $client_schools = null;
        $administrator = \App\Administrator::where('user_id', $user->id)->first();
        $clients = \App\Client::where('user_id' , $user->id)->get();
        if($administrator != null)
        {
            $admin_schools = \App\School::where('id', $administrator->school_id)->first();
        }

        //dd($client_schools);
        $schools = \Auth::user()->schools()->get();
        $post = "/".$school->username."/client/forum/class/".$client->id."/";
        $messages = $this->messages($school, 1, $client);
        $title = "Class Space";
        return view('client.account.messenger', compact('title','user', 'schools','admin_schools','school','clients','client', 'post', 'messages'));
    }
*/

