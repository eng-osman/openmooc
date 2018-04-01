<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCoursesLessonsCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courses_lessons_comments', function(Blueprint $table)
		{
			$table->foreign('lesson_id', 'commentsLessonsRel')->references('lesson_id')->on('courses_lessons')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('created_by', 'commentsUsersRel')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courses_lessons_comments', function(Blueprint $table)
		{
			$table->dropForeign('commentsLessonsRel');
			$table->dropForeign('commentsUsersRel');
		});
	}

}
