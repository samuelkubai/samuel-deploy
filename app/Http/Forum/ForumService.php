<?php namespace App\Http\Forum;


use App\Commands\SendMessageComand;
use App\Message;
use App\School;

class ForumService {



    public function clientPost($request, $client, $subject)
    {
        $name = $client->firstName . " " . $client->lastName;
        $school = School::where('username', $client->username)->first();
        return $this->send($request, $school, $name, $subject, $client);
    }


    public function adminPost($request, $school, $subject)
    {
        $name = 'Admin';
        return $this->send($request, $school, $name, $subject);
    }



    public function send($request, $school, $name, $subject,  $client=null)
    {
        $message =null;

        if($client != null){
            $user = \Auth::user();
            if (isset($client->id) && isset($client->class))
            {

                $message = new SendMessageComand($request->title, $subject->id, $user, $name, $request->message, $school->id, $client->id , null, $client->class , 1);
            }


        } else {
            $user = \Auth::user();
            $message = new SendMessageComand($request->title, $subject->id, $user, $name, $request->message, $school->id, null, 0);

        }
        return $message;
    }

    /**
     * @param $client
     * @param $subject
     */
    public function clientMessages($client, $subject)
    {
        $school = School::where('username', $client->username)->first();

        return $this->messages($school, $subject);
    }

    public function messages($school, $subject)
    {
        return Message::where('school_id', $school->id)->where('subject', $subject->id)->orderBy('created_at', 'DESC')->get();
    }

    public function groupsForUser($user)
    {
        
    }
}