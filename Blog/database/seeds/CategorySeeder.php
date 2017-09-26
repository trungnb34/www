<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->insert(
            [
                [
                    'category_name' => 'Lập trình PHP',
                    'parent_id' => 0,
                    'slug' => 'lap-trinh-php',
                    'timeDelete' => null,
                    'menu_id' => 2,
                ],
                [
                    'category_name' => 'Javascript',
                    'parent_id' => 0,
                    'slug' => 'javascript',
                    'timeDelete' => null,
                    'menu_id' => 2,
                ],
                [
                    'category_name' => 'Java',
                    'parent_id' => 0,
                    'slug' => 'java',
                    'timeDelete' => null,
                    'menu_id' => 2,
                ],
                [
                    'category_name' => 'Database',
                    'parent_id' => 0,
                    'slug' => 'database',
                    'timeDelete' => null,
                    'menu_id' => 2,
                ]
            ]
        );
    }
}
