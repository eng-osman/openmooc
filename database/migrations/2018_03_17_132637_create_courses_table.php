<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->integer('course_id', true);
			$table->string('course_name', 250);
			$table->integer('course_category')->index('coursesCoursesCategoriesRel_idx');
			$table->integer('course_instructor')->index('coursesUsersRel_idx');
			$table->text('course_description', 65535)->nullable();
			$table->string('course_cover', 150)->nullable();
			$table->boolean('is_active')->nullable();
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
		Schema::drop('courses');
	}

}
