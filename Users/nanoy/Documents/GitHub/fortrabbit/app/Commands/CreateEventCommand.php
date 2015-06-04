<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

use App\Http\Timeline\TimelineRepository;

class CreateEventCommand extends Command implements SelfHandling {


	private $request;

	private $group;

    /**
     * Create a new command instance.
     *
     * @param $request
     * @param $group
     * @internal param $school
     * @return \App\Commands\CreateEventCommand
     */
	public function __construct($request, $group )
	{
		$this->request = $request;

		$this->group = $group;
	}

    /**
     * Execute the command.
     *
     * @param TimelineRepository $repo
     * @return void
     */
	public function handle(TimelineRepository $repo)
	{
		
		$repo->createEvent($this->request, $this->group);
	}

}
