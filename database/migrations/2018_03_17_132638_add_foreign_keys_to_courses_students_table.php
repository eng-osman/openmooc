<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses_students', function(Blueprint $table)
		{
			$table->foreign('course_id', 'coursesStudentsCoursesRel')->references('course_id')->on('courses')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('student_id', 'coursesStudentsUsersRel')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses_students', function(Blueprint $table)
		{
			$table->dropForeign('coursesStudentsCoursesRel');
			$table->dropForeign('coursesStudentsUsersRel');
		});
	}

}
