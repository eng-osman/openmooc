<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_rate', function(Blueprint $table)
		{
			$table->integer('rate_id', true);
			$table->integer('student_id')->index('coursesRateUsersRel_idx');
			$table->integer('course_id')->index('coursesRateCourseRel_idx');
			$table->integer('rate');
			$table->text('rate_comment', 65535)->nullable();
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
		Schema::drop('courses_rate');
	}

}
