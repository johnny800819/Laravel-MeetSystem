<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class calendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('posts')->delete();

    	$faker = Faker::create();
		for ($i=0; $i < 10; $i++) {
		    Post::create(['title' => $faker->sentence, 'content' => $faker->text]);
		}
    }
}
