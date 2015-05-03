<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('schoolName');
            $table->string('schoolMotto');
            $table->string('username')->unique();
            $table->string('telNumber');
            $table->string('email')->nullable();
            $table->string('url')->nullable();

            $table->string('user_id');
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
		Schema::drop('schools');
	}

}
