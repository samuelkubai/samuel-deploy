<?php

use App\Attendance;
use App\Chatmessage;
use App\Chatroom;
use App\Event;
use App\Folder;
use App\Follow;
use App\Group;
use App\Notice;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

    protected $tables = [
        'users',
        'groups',
        'follows',
        'notices',
        'folders',
        'events',
        'chatrooms',
        'chatmessages',
        'attendances',
    ];

    protected $seeders = [
        'UserTableSeeder',
        'GroupTableSeeder',
        'FollowerTableSeeder',
        'NoticeTableSeeder',
        'FolderTableSeeder',
        'EventTableSeeder',
        'ChatroomTableSeeder',
        'ChatmessageTableSeeder',
        'AttendanceTableSeeder',
    ];
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->cleanDatabase();

        foreach ($this->seeders as $seedClass) {
            $this->call($seedClass);
        }
	}

    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            User::create([
                'firstName' => $faker->name,
                'lastName' => $faker->name,
                'telNumber' => $faker->phoneNumber,
                'active' => '1',
                'password' => 'secret',
                'email' => $faker->email . $index,

            ]);
        }
    }
}

class GroupTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $userIds = User::lists('id');
        foreach (range(1, 20) as $index) {
            Group::create([
                'user_id' => $faker->randomElement($userIds),
                'username' => $faker->word .$index,
                'name' => $faker->name,
                'description' => $faker->paragraph(),
                'email' => $faker->email . $index,

            ]);
        }
    }
}

class FollowerTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create();
        $userIds = User::lists('id');
        $groupIds = Group::lists('id');

        foreach (range(1, 200) as $index) {
            Follow::create([
                'user_id' => $faker->randomElement($userIds),
                'group_id' => $faker->randomElement($groupIds),

            ]);
        }
    }
}

class NoticeTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {

        $faker = Faker::create();
        $userIds = User::lists('id');
        $groupIds = Group::lists('id');

        foreach (range(1, 200) as $index) {
            Notice::create([
                'title' => $faker->word,
                'user_id' => $faker->randomElement($userIds),
                'group_id' => $faker->randomElement($groupIds),
                'message' => $faker->paragraph(),
            ]);
        }
    }
}

class FolderTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {

        $faker = Faker::create();
        $groupIds = Group::lists('id');

        foreach (range(1, 200) as $index) {
            Folder::create([
                'name' => $faker->word,
                'group_id' => $faker->randomElement($groupIds),
                'folder_id' => null,
                'sub-directory' => 0,

            ]);
        }
    }
}

class EventTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {

        $faker = Faker::create();
        $folderIds = Folder::lists('id');
        $groupIds = Group::lists('id');

        foreach (range(1, 200) as $index) {
            Event::create([
                'title' => $faker->word,
                'category' => $faker->word,
                'date' => $faker->date(),
                'status' => '1',
                'sponsor' => $faker->name,
                'group_id' => $faker->randomElement($groupIds),
                'folder_id' => $faker->randomElement($folderIds),
                'description' => $faker->paragraph(),
                'chatroom_id' => $index,
            ]);
        }
    }
}

class ChatroomTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 200) as $index) {
            Chatroom::create([
                'name' => $faker->word,
                'event_id' => $index,
            ]);
        }
    }
}

class ChatmessageTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {

        $faker = Faker::create();
        $roomIds = Chatroom::lists('id');
        $userIds = User::lists('id');

        foreach (range(1, 200) as $index) {
            Chatmessage::create([
                'message' => $faker->sentence(),
                'user_id' => $faker->randomElement($userIds),
                'chatroom_id' => $faker->randomElement($roomIds),
            ]);
        }
    }
}

class AttendanceTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {

        $faker = Faker::create();
        $eventIds = Event::lists('id');
        $userIds = User::lists('id');

        foreach (range(1, 200) as $index) {
            Attendance::create([
                'user_id' => $faker->randomElement($userIds),
                'event_id' => $faker->randomElement($eventIds),
            ]);
        }
    }
}
