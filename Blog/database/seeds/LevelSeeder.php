<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert(
            [
                [
                    'level_name' => 'Admin',
                    'status_show' => 1,
                    'level' => 500,
                ],
                [
                    'level_name' => 'Thành viên',
                    'status_show' => 1,
                    'level' => 10,
                ]
            ]
        );
    }
}
