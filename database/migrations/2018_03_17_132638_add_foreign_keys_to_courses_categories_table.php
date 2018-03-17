<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses_categories', function(Blueprint $table)
		{
			$table->foreign('created_by', 'coursesCategoriesUsersRel')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses_categories', function(Blueprint $table)
		{
			$table->dropForeign('coursesCategoriesUsersRel');
		});
	}

}
