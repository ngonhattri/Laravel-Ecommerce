<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $name1 = ['chuột', 'bàn phím', 'màn hình', 'tai nghe', 'bo mạch'];
        for ($i = 0; $i < 50; $i++) {
            $image = array();
            for ($i = 0; $i < 3; $i++) {
                array_push($image, 'images/products/' . $faker->numberBetween($min = 1, $max = 78) . '.jpg');
            }
            Product::insert([
                [
                    'name' => 'Sản phẩm ' . array_random($name1) . ' ' . $this->generateRandomString(). ''. $faker->numberBetween($min = 100000000, $max = 999999999),
                    'alias' => str_slug('Sản phẩm ' . $faker->numberBetween($min = 1, $max = 10000000)),
                    'content' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
                    'gallery' => json_encode($image),
                    'quantity' => $faker->numberBetween($min = 1, $max = 50),
                    'price' => (int) $faker->numberBetween($min = 100, $max = 10000) . '000',
                    'facebook' => $faker->url,
                    'phone' => '0' . $faker->numberBetween($min = 100000000, $max = 999999999),
                    'status' => $faker->numberBetween($min = 0, $max = 1),
                    'meta_keyword' => $faker->realText($maxNbChars = 191, $indexSize = 2),
                    'meta_description' => $faker->realText($maxNbChars = 500, $indexSize = 2),
                    'id_category' => $faker->numberBetween($min = 1, $max = 4),
                    'out_of_stock' => 1,
                    'id_user' => $faker->numberBetween($min = 1, $max = 50),
                ]
            ]);
        }

    }
    
    public function generateRandomString($length = 2) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
