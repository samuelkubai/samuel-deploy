<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

use App\Http\Notice\NoticeRepository;


class PinNoticeCommand extends Command implements SelfHandling {


	private $request;

	private $school;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($request, $school)
	{
		$this->request = $request;

		$this->school = $school;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(NoticeRepository $repo)
	{
		
		$repo->createEvent($this->request, $this->school);
	}


}
