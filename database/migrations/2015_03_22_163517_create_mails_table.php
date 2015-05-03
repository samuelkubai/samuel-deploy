<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mails', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('subject')->nullable();
            $table->text('message')->nullable();

            $table->integer('user_id');
            $table->integer('receiver_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('admin_id')->nullable();

            $table->integer('from')->nullable();
            $table->integer('to')->nullable();

            $table->string('role')->nullable();
            $table->integer('status')->nullable();

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
		Schema::drop('mails');
	}

}
