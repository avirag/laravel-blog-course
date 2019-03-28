<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagsTableSeeder extends Seeder
{
    private $tags = [
        ['name' => 'PHP', 'slug' => 'php'],
        ['name' => 'Laravel', 'slug' => 'laravel'],
        ['name' => 'Symphony', 'slug' => 'symphony'],
        ['name' => 'Vue JS', 'slug' => 'vujs']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();

        $tagIds = [];
        foreach ($this->tags as $tag) {
            $item = new Tag();
            $item->name = $tag['name'];
            $item->slug = $tag['slug'];
            $item->save();
            $tagIds[] = $item->id;
        }

        foreach (Post::all() as $post) {
            shuffle($tagIds);

            for ($i = 0; $i < rand(0, count($tagIds) -1); $i++) {
                $post->tags()->detach($tagIds[$i]);
                $post->tags()->attach($tagIds[$i]);
            }
        }

    }
}
