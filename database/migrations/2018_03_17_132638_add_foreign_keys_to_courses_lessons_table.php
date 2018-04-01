<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses_lessons', function(Blueprint $table)
		{
			$table->foreign('lesson_course', 'lessonsCoursesRel')->references('course_id')->on('courses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('lesson_instructor', 'lessonsUsersRel')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses_lessons', function(Blueprint $table)
		{
			$table->dropForeign('lessonsCoursesRel');
			$table->dropForeign('lessonsUsersRel');
		});
	}

}
