<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoLangContentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('photo_lang_contents', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('photo_id')->unsigned()->nullalbe();
			$table->integer('lang_id')->unsigned()->nullalbe();
			$table->string('caption')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('photo_lang_contents');
	}
}
