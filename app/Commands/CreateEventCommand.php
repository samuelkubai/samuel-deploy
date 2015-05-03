<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

use App\Http\Timeline\TimelineRepository;

class CreateEventCommand extends Command implements SelfHandling {


	private $request;

	private $school;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($request, $school )
	{
		$this->request = $request;

		$this->school = $school;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(TimelineRepository $repo)
	{
		
		$repo->createEvent($this->request, $this->school);
	}

}
