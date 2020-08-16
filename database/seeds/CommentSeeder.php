<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::all()->each(function ($user) {
            $user->posts()->each(function ($post) {
                $post->comments()->save(factory(App\Comment::class, 5)->create());
            });
        });
    }
}
