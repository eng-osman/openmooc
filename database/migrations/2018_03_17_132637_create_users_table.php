<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 150);
			$table->string('name', 150);
			$table->string('image', 150)->nullable();
			$table->string('email', 150);
			$table->string('password', 150);
			$table->integer('user_group')->index('usersUsersGroupsRel_idx');
			$table->text('about', 65535)->nullable();
			$table->boolean('is_active')->nullable();
			$table->string('remember_token', 150)->nullable();
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
		Schema::drop('users');
	}

}
