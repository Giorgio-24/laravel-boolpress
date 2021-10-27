<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
//? non necessario al momento-> use Faker\Generator as Faker;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'FrontEnd', 'color' => 'primary'],
            ['name' => 'BackEnd', 'color' => 'danger'],
            ['name' => 'FullStack', 'color' => 'warning'],
            ['name' => 'UI/UX', 'color' => 'secondary'],
            ['name' => 'Design', 'color' => 'success'],
            ['name' => 'DevOps', 'color' => 'info']
        ];

        foreach ($tags as $current_tag) {
            $tag = new Tag();

            $tag->name = $current_tag['name'];
            $tag->color = $current_tag['color'];
            $tag->save();
        }
    }
}
