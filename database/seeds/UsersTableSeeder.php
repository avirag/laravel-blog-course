<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

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

        $faker = Factory::create();
        // generate 3 users/authors
        DB::table('users')->insert([
            [
                'name' => "Anita Virag",
                'slug' => 'anita-virag',
                'email' => "anitavirag@test.com",
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],            [
                'name' => "Jane Doe",
                'slug' => 'jane-doe',
                'email' => "janedoe@test.com",
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],            [
                'name' => "Leon Norman ",
                'slug' => 'leon-norman',
                'email' => "leonnorman@test.com",
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ]
        ]);
    }
}
