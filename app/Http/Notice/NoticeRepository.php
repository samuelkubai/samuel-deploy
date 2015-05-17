<?php namespace App\Http\Notice;

use App\Notice;

use App\School;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\Postable;


class NoticeRepository
{

    use Postable;


    public function createNotice ($request, $group)
	{
		$group->notices()->create(
			[
				'title' => $request->title,
				'message' => $request->message,
			]
		);

        $user = \Auth::user();
        $message = $user->firstName.' ' .$user->lastName . ' created a new Pin on ' .$group->name ;
        $this->post($message , $group);
	}

	public function pinsForSchool($group)
	{
		return Notice::where('group_id', $group->id)->get();
	}
}