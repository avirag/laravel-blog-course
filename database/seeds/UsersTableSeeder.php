<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users/authors
        DB::table('users')->insert([
            [
                'name' => "John Doe",
                'email' => "johndoe@test.com",
                'password' => bcrypt('secret')
            ],            [
                'name' => "Jane Doe",
                'email' => "janedoe@test.com",
                'password' => bcrypt('secret')
            ],            [
                'name' => "Leon Norman ",
                'email' => "leonnorman@test.com",
                'password' => bcrypt('secret')
            ]
        ]);
    }
}
