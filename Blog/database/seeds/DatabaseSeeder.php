<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(MenuSeeder::class);
        //$this->call(LevelSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(PostTypeSeeder::class);
        //$this->call(FeedBackSeeder::class);
        //$this->call(CategorySeeder::class);
    }
}
