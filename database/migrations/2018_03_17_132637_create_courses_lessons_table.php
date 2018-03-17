<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_lessons', function(Blueprint $table)
		{
			$table->integer('lesson_id', true);
			$table->string('lesson_title', 250);
			$table->integer('lesson_course')->index('lessonsCoursesRel_idx');
			$table->integer('lesson_instructor')->index('lessonsUsersRel_idx');
			$table->text('lesson_description', 65535)->nullable();
			$table->string('lesson_video', 250);
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
		Schema::drop('courses_lessons');
	}

}
