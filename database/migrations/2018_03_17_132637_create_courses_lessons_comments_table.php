<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesLessonsCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_lessons_comments', function(Blueprint $table)
		{
			$table->integer('comment_id', true);
			$table->text('comment', 65535);
			$table->integer('created_by')->index('commentsUsersRel_idx');
			$table->integer('lesson_id')->index('commentsLessonsRel_idx');
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
		Schema::drop('courses_lessons_comments');
	}

}
