<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 6000)->create();
        //create account for admin
        // DB::table('users')->insert(
        //     [
        //         'first_name' => 'admin',
        //         'last_name'  => '1',
        //         'level_id' => 1,
        //         'email' => 'admin',
        //         'activate' => 1,
        //         'avatar' => 'https://i.pinimg.com/736x/be/0a/b7/be0ab7e1a7f2f5a319e190ec0bad1e31--cute-girls-vietnam.jpg',
        //         'token_datetime' => '1991-03-03 21:02:08',
        //         'password' => bcrypt('123456'),
        //         'token' => bcrypt('trung'),
        //     ]
        // );
    }
}
