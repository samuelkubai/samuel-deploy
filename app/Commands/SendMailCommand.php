<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class SendMailCommand extends Command implements SelfHandling {
    /**
     * Holds the subject of the mail
     * @var
     */
    protected $subject;
    /**
     * Holds the Message body of the mail
     * @var
     */
    protected $message;
    /**
     * Holds the user id of the recipient of the mail
     * @var
     */
    protected $receiver_id;
    /**
     * Holds the school id that the mail belongs to.
     * @var
     */
    protected $school_id;
    /**
     * Holds the role of the sender of the mail
     * @var
     */
    protected $role;
    /**
     * This is the user that is sending the mail
     * @var
     */
    protected $user;
    /**
     * @var
     */
    protected $from;
    /**
     * @var
     */
    protected $to;
    /**
     * @var
     */
    protected $admin_id;
    /**
     * @var
     */
    private $client_id;


    /**
     * Create a new command instance.
     * @param $user
     * @param $subject
     * @param $message
     * @param $receiver_id
     * @param $school_id
     * @param $role
     * @param $from
     * @param $to
     * @param $client_id
     * @param $admin_id
     * @internal param $id
     * @internal param $status
     * @internal param $user_id
     */
	public function __construct($user, $subject, $message, $receiver_id, $school_id, $role, $from, $to, $client_id, $admin_id)
	{

        /** @var TEXT $subject */
        $this->subject = $subject;
        $this->message = $message;
        $this->receiver_id = $receiver_id;
        $this->school_id = $school_id;
        $this->role = $role;
        $this->user = $user;
        $this->from = $from;
        $this->to = $to;
        $this->admin_id = $admin_id;
        $this->client_id = $client_id;
    }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
        $this->user->mail()->create(
            [
                'subject' => $this->subject,
                'message' => $this->message,
                'receiver_id' => $this->receiver_id,
                'school_id' => $this->school_id,
                'role' => $this->role,
                'status' => 0,
                'from' => $this->from,
                'to' => $this->to,
                'client_id' =>  $this->client_id,
                'admin_id' => $this->admin_id,
            ]
        );

        return true;
	}

}
