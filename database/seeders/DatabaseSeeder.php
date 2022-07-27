<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        // \App\Models\User::factory(10)->create();
         Category::factory(10)->create();
         $tags = Tag::factory(20)->create();
         $posts = Post::factory(100)->create();
         foreach ($posts as $post) {
             $post->tags()->attach($tags->random(5)->pluck('id'));
         }

    }
}
