<?php namespace App\Http\Notice;

use App\Notice;

use App\School;

/**
* 
*/
class NoticeRepository
{
	
	function __construct()
	{
		# code...
	}

	public function createEvent($request, $school)
	{
		//dd($this->school);
		Notice::create(
			[
				'title' => $request->title,
				'message' => $request->message,
				'school_id' => $school->id,
			]
		);
	}

	public function pinsForSchool($school)
	{
		return Notice::where('school_id', $school->id)->get();
	}
}