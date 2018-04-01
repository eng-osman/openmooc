<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses_rate', function(Blueprint $table)
		{
			$table->foreign('course_id', 'coursesRateCourseRel')->references('course_id')->on('courses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('student_id', 'coursesRateUsersRel')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses_rate', function(Blueprint $table)
		{
			$table->dropForeign('coursesRateCourseRel');
			$table->dropForeign('coursesRateUsersRel');
		});
	}

}
