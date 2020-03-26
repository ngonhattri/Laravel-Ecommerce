<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 50; $i++) { 
            User::insert([
                [
                    'name' => 'Tester '.$i,
                    'password' => bcrypt('tester'),
                    'email'=>'tester_'.$i.'@gmail.com',
                    'phone'=>'09388010'.$i,
                    'id_school'=> $faker->numberBetween($min = 1, $max = 4),
                    'avatar'=> $faker->imageUrl($width = 640, $height = 480, 'people'),
                    'facebook'=> $faker->url,
                    'instagram'=> $faker->url,
                    'about'=> $faker->realText($maxNbChars = 500, $indexSize = 2)
                ]
            ]);   
        }
    }
}
