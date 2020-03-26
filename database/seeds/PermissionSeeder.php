<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                'title' => 'Quản lý banner',
                'name' => 'banner',
                'id_category'=> 1
            ],
            [
                'title' => 'Quản lý danh mục',
                'name' => 'category',
                'id_category'=> 1
            ],
            [
                'title' => 'Quản lý liên hệ',
                'name' => 'contact',
                'id_category'=> 1
            ],
            [
                'title' => 'Quản lý slide',
                'name' => 'slide',
                'id_category'=> 1
            ],
            [
                'title' => 'Quản lý trường',
                'name' => 'school',
                'id_category'=> 1
            ],
            [
                'title' => 'Kích hoạt người dùng',
                'name' => 'change_customer',
                'id_category'=> 2
            ],
            [
                'title' => 'Kích hoạt sản phẩm người dùng',
                'name' => 'change_product',
                'id_category'=> 2
            ],
            [
                'title' => 'Xóa sản phẩm người dùng',
                'name' => 'delete_product',
                'id_category'=> 2
            ],
            [
                'title' => 'Kích hoạt cửa hàng người dùng',
                'name' => 'change_store',
                'id_category'=> 2
            ],
            [
                'title' => 'Xóa cửa hàng người dùng',
                'name' => 'delete_store',
                'id_category'=> 2
            ],
            [
                'title' => 'Quản lý trang',
                'name' => 'page',
                'id_category'=> 3
            ],
            [
                'title' => 'Quản lý danh mục điều lệ',
                'name' => 'rule_category',
                'id_category'=> 4
            ],
            [
                'title' => 'Quản lý điều lệ',
                'name' => 'rule',
                'id_category'=> 4
            ],
            [
                'title' => 'Quản trị nhân sự',
                'name' => 'account',
                'id_category'=> 5
            ]
        ]);
    }
}

