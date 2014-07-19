<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bands', function($table){
			$table->integer('id');
			$table->string('name');
			$table->string('genre');
			$table->string('country');
			$table->string('location');
			$table->string('status');
			$table->string('year_creation');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bands');
	}

}
