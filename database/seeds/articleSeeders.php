<?php

use Illuminate\Database\Seeder;

class articleSeeders extends Seeder
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
            $article = \App\Article::create([
                'title'=>$faker->title,
                'author'=>$faker->name,
                'status'=>$faker->randomElement(['active', 'inactive']),
                'price'=>$faker->numberBetween(10,200)
            ]);
        }
    }
}
