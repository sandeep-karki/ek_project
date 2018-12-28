<?php

use Illuminate\Database\Seeder;


class LanguageSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		if (DB::table('language')->where('short_code', 'us')->first() == null) {
			DB::table('language')->insert([
				[
					'name' => 'English',
					'short_code' => 'us',
				],
			]);
		}

		if (DB::table('language_category')->where('name', 'Backend')->first() == null) {
			DB::table('language_category')->insert([
				[
					'name' => 'Backend',
					'default_lang' => '1',
				],
			]);
		}

		if (DB::table('system_languages')->where('language_id', '1')->where('category_id', '1')->first() == null) {
			DB::table('system_languages')->insert([
				[
					'language_id' => '1',
					'category_id' => '1',
				],
			]);
		}

		if (DB::table('language_category')->where('name', 'Frontend')->first() == null) {
			DB::table('language_category')->insert([
				[
					'name' => 'Frontend',
					'default_lang' => '1',
				],
			]);
		}

		if (DB::table('system_languages')->where('language_id', '1')->where('category_id', '2')->first() == null) {
			DB::table('system_languages')->insert([
				[
					'language_id' => '1',
					'category_id' => '2',
				],
			]);
		}

	}
}
