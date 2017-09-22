<?php

use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_types')->insert(
            [
                [
                    'post_type_name' => 'forcus',
                ],
                [
                    'post_type_name' => 'main',
                ],
                [
                    'post_type_name' => 'normal',
                ],
            ]
        );
    }
}
