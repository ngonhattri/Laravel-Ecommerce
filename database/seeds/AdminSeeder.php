<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
                'username'=>'admin',
                'name' => 'Nguyễn Minh Quân',
                'password' => bcrypt('admin'),
                'role_id'=>1,
                'email'=>'minhquan.k0r1@gmail.com',
                'phone'=>'0938801071',
                'avatar'=>'/files/1/Avatar/admin.jpg',
                'facebook'=>'https://www.facebook.com/Quan.K0r1',
                'address'=>'76 Phan Tây Hồ, Phường 7, Quận Phú Nhuận'
            ]
        ]);   
    }
}
