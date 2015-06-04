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
                'user_id' => \Auth::user()->id,
			]
		);

        $user = \Auth::user();
        $message = $user->firstName.' ' .$user->lastName . ' created a new Pin on ' .$group->name ;
        $url = $group->username . '/notice';
        $this->post($message , $group, $url);
	}

	public function pinsForSchool($group, $howMany = 8)
	{
		return Notice::where('group_id', $group->id)->latest()->paginate($howMany);
	}
}