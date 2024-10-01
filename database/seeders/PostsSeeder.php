<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Functions\Helper; // Namespace corretto

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {
            $titolo = $faker->sentence(6, true);

            $new_post = new Post();
            $new_post->name = $faker->name;
            $new_post->title = $titolo;
            $new_post->slug = Helper::generateSlug($titolo, Post::class);
            $new_post->topic = $faker->word;
            $new_post->start_date = $faker->date;
            $new_post->end_date = $faker->optional()->date;
            $new_post->number_of_posts = $faker->numberBetween(1, 100);
            $new_post->collaborators = $faker->sentence(3);
            $new_post->save();
        }
    }
}
