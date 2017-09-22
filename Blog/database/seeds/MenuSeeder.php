<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert(
            [
                [
                    'name_menu' => 'Tham khảo',
                    'status_show' => 1,
                ],
                [
                    'name_menu' => 'Lập trình',
                    'status_show' => 1,
                ],
                [
                    'name_menu' => 'Thủ thuật',
                    'status_show' => 1,
                ],
                [
                    'name_menu' => 'Downloads',
                    'status_show' => 1,
                ],
                [
                    'name_menu' => 'Mã giảm giá',
                    'status_show' => 1,
                ],
                [
                    'name_menu' => 'Khóa học',
                    'status_show' => 1,
                ],
                [
                    'name_menu' => 'Kiếm tiền',
                    'status_show' => 1,
                ],
                [
                    'name_menu' => 'Việc làm',
                    'status_show' => 1,
                ],
                [
                    'name_menu' => 'Hỏi đáp',
                    'status_show' => 1,
                ]
            ]
        );
    }
}
