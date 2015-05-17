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
     * @param $request
     * @param $school
     * @return \App\Commands\PinNoticeCommand
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
		
		$repo->createNotice($this->request, $this->school);
	}


}
