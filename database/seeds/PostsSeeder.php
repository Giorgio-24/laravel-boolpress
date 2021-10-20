<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
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
        for ($i = 0; $i < 50; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->text(50);
            $newPost->content = $faker->paragraphs(3, true);
            $newPost->image = $faker->imageUrl(640, 480);

            $newPost->save();
        }
    }
}
