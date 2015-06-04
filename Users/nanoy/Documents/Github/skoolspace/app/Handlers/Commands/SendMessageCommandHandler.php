<?php namespace App\Handlers\Commands;

use App\Commands\SendMessageCommand;

use Illuminate\Queue\InteractsWithQueue;

class SendMessageCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  SendMessageCommand  $command
	 * @return void
	 */
	public function handle(SendMessageCommand $command)
	{
		dd($command);
	}

}
