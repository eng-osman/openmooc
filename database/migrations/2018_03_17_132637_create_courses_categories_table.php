<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_categories', function(Blueprint $table)
		{
			$table->integer('category_id', true);
			$table->string('category_name', 150);
			$table->integer('created_by')->index('coursesCategoriesUsersRel_idx');
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
		Schema::drop('courses_categories');
	}

}
