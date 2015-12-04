<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('namadepan');
			$table->string('namabelakang');
			$table->string('jeniskelamin');
			$table->date('tanggallahir');
			$table->string('tempatlahir');
			$table->string('foto');
			$table->longtext('addr');
			$table->string('phone');
			$table->string('namapengguna');
			$table->string('namapanggilan');
			$table->string('katasandi');
			$table->string('blokir');
			$table->string('hubungan');
			$table->integer('jenis')->default(0);
			$table->integer('divisi');
			$table->string('fb');
			$table->string('twitter');
			$table->string('gplus');
			$table->string('path');
			$table->string('ig');
			$table->string('askfm');
			$table->string('info');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('lihat');
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
