<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageLangContentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('page_lang_contents', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('page_id')->unsigned();
			$table->integer('lang_id')->unsigned();
			$table->string('title');
			$table->string('short_description')->nullable();
			$table->text('description')->nullable();
			$table->string('background_image')->nullable();
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
		Schema::dropIfExists('page_lang_contents');
	}
}
