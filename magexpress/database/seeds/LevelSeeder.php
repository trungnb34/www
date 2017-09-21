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
                    'level' => 500,
                ],
                [
                    'level_name' => 'Thành viên',
                    'level' => 10,
                ]
            ]
        );
    }
}
