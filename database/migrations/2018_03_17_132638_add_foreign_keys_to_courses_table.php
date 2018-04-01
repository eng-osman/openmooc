<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses', function(Blueprint $table)
		{
			$table->foreign('course_category', 'coursesCoursesCategoriesRel')->references('category_id')->on('courses_categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('course_instructor', 'coursesUsersRel')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses', function(Blueprint $table)
		{
			$table->dropForeign('coursesCoursesCategoriesRel');
			$table->dropForeign('coursesUsersRel');
		});
	}

}
