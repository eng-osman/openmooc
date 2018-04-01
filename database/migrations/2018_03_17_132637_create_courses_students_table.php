<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_students', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('student_id')->index('coursesStudentsUsersRel_idx');
			$table->integer('course_id')->index('coursesStudentsCoursesRel_idx');
			$table->boolean('is_approved')->nullable();
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
		Schema::drop('courses_students');
	}

}
