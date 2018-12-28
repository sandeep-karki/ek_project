<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryLangContentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('gallery_lang_contents', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('gallery_id')->unsigned()->nullable();
			$table->integer('lang_id')->unsigned()->nullable();
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->string('html_title')->nullable();
			$table->string('html_description')->nullable();
			$table->string('html_keywords')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('gallery_lang_contents');
	}
}
