<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class SendMessageComand extends Command  {
    protected $subject;
    /**
     * @var
     */
    private $user;
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $message;
    /**
     * @var
     */
    private $class;
    /**
     * @var
     */
    private $school_id;
    /**
     * @var
     */
    private $client_id;
    /**
     * @var
     */
    private $admin_id;
    /**
     * @var
     */
    private $role;
    /**
     * @var
     */
    private $title;

    /**
     * Create a new command instance.
     * @param $title
     * @param $subject
     * @param $user
     * @param $name
     * @param $message
     * @param $school_id
     * @param $client_id
     * @param $admin_id
     * @param int $class
     * @param int $role
     */
	public function __construct($title, $subject ,$user, $name, $message, $school_id, $client_id, $admin_id, $class = 0, $role = 0)
	{

        $this->user = $user;
        $this->name = $name;
        $this->message = $message;
        $this->class = $class;
        $this->school_id = $school_id;
        $this->client_id = $client_id;
        $this->admin_id = $admin_id;
        $this->role = $role;
        $this->subject = $subject;
        $this->title = $title;
    }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
    /*
	public function handle()
	{
        $this->user->messages()->create(
            [
                'title' => $this->title,
                'name' => $this->name,
                'message' => $this->message,
                'class' => $this->class,
                'subject' => $this->subject,
                'school_id' => $this->school_id,
                'client_id' =>  $this->client_id,
                'admin_id' => $this->admin_id,
                'role' => $this->role,
            ]
        );
	}
    */  
}
