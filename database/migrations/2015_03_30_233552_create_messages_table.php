<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('title');
            $table->string('name');
            $table->text('message');
            $table->integer('class');
            $table->integer('subject');
            $table->integer('role');

            $table->integer('user_id');
            $table->integer('school_id');
            $table->integer('client_id')->nullable();
            $table->integer('admin_id')->nullable();

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
		Schema::drop('messages');
	}

}
