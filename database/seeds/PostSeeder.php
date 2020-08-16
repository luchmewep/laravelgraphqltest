<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
            $user->posts()->each(function ($post) {
                $post->comments()->save(factory(App\Comment::class)->make());
            });
        });
    }
}
