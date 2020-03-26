<?php

use Illuminate\Database\Seeder;
use App\Models\School;
class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::insert([
            [
                'name' => 'Đại học HUTECH cơ sở Điện Biên Phủ',
                'alias' => 'dai-hoc-hutech-co-so-dien-bien-phu',
                'address'=>'475 A Điện Biên Phủ, Phường 25, Bình Thạnh, Hồ Chí Minh',
                'image'=>'/files/1/School/Hutech.png',
                'meta_keyword'=>'Đại học HUTECH cơ sở Điện Biên Phủ',
                'meta_description'=>'Đại học HUTECH cơ sở Điện Biên Phủ',
            ],
            [
                'name' => 'Đại học HUTECH cơ sở Ung Văn Khiêm',
                'alias' => 'dai-hoc-hutech-co-so-ung-van-khiem',
                'address'=>'31/36 Ung Văn Khiêm, Phường 25, Bình Thạnh, Hồ Chí Minh',
                'image'=>'/files/1/School/Hutech.png',
                'meta_keyword'=>'Đại học HUTECH cơ sở Ung Văn Khiêm',
                'meta_description'=>'Đại học HUTECH cơ sở Ung Văn Khiêm',
            ],
            [
                'name' => 'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao - HUTECH',
                'alias' => 'trung-tam-dao-tao-nhan-luc-chat-luong-cao-hutech',
                'address'=>'Phường Tân Phú, Quận 9, Hồ Chí Minh',
                'image'=>'/files/1/School/Hutech.png',
                'meta_keyword'=>'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao - HUTECH',
                'meta_description'=>'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao - HUTECH',
            ],
            [
                'name' => 'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao 2 - HUTECH',
                'alias' => 'trung-tam-dao-tao-nhan-luc-chat-luong-cao-2-hutech',
                'address'=>'Phường Tân Phú, Quận 9, Hồ Chí Minh',
                'image'=>'/files/1/School/Hutech.png',
                'meta_keyword'=>'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao 2 - HUTECH',
                'meta_description'=>'Trung Tâm Đào Tạo Nhân Lực Chất Lượng Cao 2 - HUTECH',
            ]
        ]);  
    }
}
