<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('popups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idpengguna');
			$table->string('judul');
			$table->text('deskripsi');
			$table->integer('keep_open');
			$table->text('tipe_valid');
			$table->date('date_valid_start');
			$table->date('date_valid_end');
			$table->time('time_valid_start');
			$table->time('time_valid_end');
			$table->string('slug');
			$table->string('hotlink');
			$table->string('image');
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
		Schema::drop('popups');
	}

}
