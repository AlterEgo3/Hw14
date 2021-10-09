<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Models\Category::factory()->count(10)->create();

        $tags = \App\Models\Tag::factory()->count(100)->create();

        $posts = Post::factory()->count(10)->make(['category_id' => null]);

        $posts->each(function (Post $post) use ($categories) {
            $post->category()->associate($categories->random());
            $post->save();
        });

        $posts->each(function (Post $post) use ($tags) {
            $post->tags()->attach($tags->random(rand(3, 5))->pluck('id'));
        });
    }
}
