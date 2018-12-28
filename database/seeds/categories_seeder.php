<?php

use Illuminate\Database\Seeder;

class categories_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i <= 50 ; $i++){
            $catgories = \App\Category::create([
                'title'=>$faker->title,

            ]);
        }

        for($i=0; $i <= 50 ; $i++){
            $catgories = \App\ArticleCategory::create([
                'article_id'=> $faker->numberBetween(1,50),
                'category_id'=> $faker->numberBetween(1,50),

            ]);
        }
    }
}
