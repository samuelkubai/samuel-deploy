<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('date');
			$table->string('title');
			$table->string('sponsor');
			$table->integer('status');
			$table->text('description');
			$table->string('category')->nullable();
			$table->string('profile')->nullable();
			$table->integer('group_id');
			$table->integer('folder_id');
			$table->integer('chatroom_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
