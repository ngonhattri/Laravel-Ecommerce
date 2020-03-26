<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'Chuột',
                'alias' => 'chuot',
                'display_order' => 1,
                'meta_keyword' => 'Chuột',
                'meta_description' => 'Chuột'
            ],
            [
                'name' => 'Bàn phím',
                'alias' => 'ban-phim',
                'display_order' => 2,
                'meta_keyword' => 'Bàn phím',
                'meta_description' => 'Bàn phím'
            ],
            [
                'name' => 'Linh kiện',
                'alias' => 'linh kien',
                'display_order' => 3,
                'meta_keyword' => 'Linh kiện',
                'meta_description' => 'Linh kiện'
            ],
            [
                'name' => 'Màn hình',
                'alias' => 'man-hinh',
                'display_order' => 4,
                'meta_keyword' => 'Màn hình',
                'meta_description' => 'Màn hình'
            ],
            [
                'name' => 'Laptop',
                'alias' => 'laptop',
                'display_order' => 5,
                'meta_keyword' => 'Laptop',
                'meta_description' => 'Laptop'
            ],
        ]);   
    }
}
