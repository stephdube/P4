<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function($table){
			// Unique id/Primary key for each album row
			$table->increments('id');

			// Note when each row is created/updated
			$table->timestamps();

			$table->string('title');
			$table->integer('band_id');
			$table->string('type');
			$table->string('label');
			$table->date('release_date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('albums');
	}

}
