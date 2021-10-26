<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        /* Qui sto selezionando la colonna id, pluck mi restituisce la collection con dentro l'array,
ma per ciclare mi serve un array piatto, e quindi faccio toArray().  */
        $categories_id = Category::pluck('id')->toArray();
        $user_id = User::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $new_post = new Post();

            $new_post->user_id = Arr::random($user_id);
            $new_post->category_id = Arr::random($categories_id);
            $new_post->title = $faker->text(50);
            $new_post->content = $faker->paragraphs(3, true);
            $new_post->image = $faker->imageUrl(640, 480);

            $new_post->save();
        }
    }
}
