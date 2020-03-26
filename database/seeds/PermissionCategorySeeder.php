<?php

use Illuminate\Database\Seeder;
use App\Models\PermissionCategory;
class PermissionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionCategory::insert([
            [
                'name' => 'Quản trị website',
            ],
            [
                'name' => 'Quản trị khách hàng',
            ],
            [
                'name' => 'Quản trị trang',
            ],
            [
                'name' => 'Quản trị điều lệ',
            ],
            [
                'name' => 'Quản trị nhân sự',
            ],
        ]);
    }
}
