<?php namespace App\Http\Mail;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserMailer {

    public function sendConfirmationMailTo($user, $code)
    {
        $data = [
            'name' => $user->firstName. ' ' . $user->lastName,
            'link' => url('/profile/activate/'. $code),
        ];


        return Mail::send('inspina.email.confirm', $data , function($message) use ($user)
        {
            $message->to($user->email, $user->firstName)->subject('Confirm your E-mail!');
        });
    }



} 