<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
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
        $categories_id = Category::select('id')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $newPost = new Post();
            $newPost->category_id = Arr::random($categories_id);
            $newPost->title = $faker->text(50);
            $newPost->content = $faker->paragraphs(3, true);
            $newPost->image = $faker->imageUrl(640, 480);

            $newPost->save();
        }
    }
}
