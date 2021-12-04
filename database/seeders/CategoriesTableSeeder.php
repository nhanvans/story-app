<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('categories')->insert([
            [
                
                'name' => 'Tiên Hiệp',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Kiếm Hiệp',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Ngôn Tình',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Đam Mỹ',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Quan Trường',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Võng Du',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Khoa Huyễn',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Hệ Thống',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Huyền Huyễn',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Dị Giới',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Dị Năng',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Quân Sự',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Lịch Sử',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Xuyên Không',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Xuyên Nhanh',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Trọng Sinh',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Trinh Thám',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Thám Hiểm',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Linh Dị',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Sắc',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Ngược',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Sủng',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Cung Đấu',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Nữ Cường',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Gia Đấu',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Đông Phương',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Đô Thị',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Bách Hợp',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Hài Hước',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Điền Văn',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Cổ Đại',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Mạt Thế',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Truyện Teen',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Phương Tây',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Nữ Phụ',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Light Novel',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Việt Nam',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Đoản Văn',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                
                'name' => 'Khác',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
        ]);
    }
}
