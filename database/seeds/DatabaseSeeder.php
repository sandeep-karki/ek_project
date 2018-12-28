<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(emailTemplateSeeders::class);
        $this->call(articleSeeders::class);
        $this->call(categories_seeder::class);
        $this->call(SecuritySettingSeeder::class);
        $this->call(CustomSettingSeeder::class);
    }
}
