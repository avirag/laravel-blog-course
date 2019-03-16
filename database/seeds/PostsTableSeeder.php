<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets the posts table
        DB::table('posts')->truncate();

        // generate 3 users/authors
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2019, 3, 4, 8);

        for ($i = 1; $i <= 10; $i++) {
            $image = "Post_Image_" . rand(1, 5) . '.jpg';
            $date->addDays(1);
            $createdDate = clone($date);
            $publishedDate = clone($date);

            $posts[] = [
                'author_id' => rand(1, 3),
                'title' => $faker->sentence(rand(8, 12)),
                'excerpt' => $faker->text(rand(250, 300)),
                'body' => $faker->paragraphs(rand(10, 15), true),
                'slug' => $faker->slug(),
                'image' => rand(0, 1) === 1 ? $image : null,
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
                'published_at' => $i < 5 ? $publishedDate : (rand(0, 1) === 0 ? null : $publishedDate->addDays(3)),
                'category_id' => 0,
                'view_count' => rand(1, 100)
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
