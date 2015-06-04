<?php namespace App\Http\Forum;


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
            if (isset($client->id))
            {
                $message = \Auth::user()->messages()->create(
                                [
                                    'title' => $request->title,
                                    'name' => $name,
                                    'message' => $request->message,
                                    'class' => 0,
                                    'subject' => $subject->id,
                                    'school_id' => $school->id,
                                    'client_id' =>  $client->id,
                                    'admin_id' => null,
                                    'role' => 1,
                                ]
                            );
            } 

        } else {

            $message = \Auth::user()->messages()->create(
                            [
                                'title' => $request->title,
                                'name' => $name,
                                'message' => $request->message,
                                'class' => 0,
                                'subject' => $subject->id,
                                'school_id' => $school->id,
                                'client_id' =>  null,
                                'admin_id' => 0,
                                'role' => 0,
                            ]
                        );
        }
        return $message;
    }

    /**
     * @param $client
     * @param $subject
     */
    public function clientMessages($school, $subject)
    {
        return $this->messages($school, $subject);
    }

    public function messages($school, $subject)
    {
        return Message::where('school_id', $school->id)->where('subject', $subject->id)->orderBy('created_at', 'DESC')->get();
    }

    
}