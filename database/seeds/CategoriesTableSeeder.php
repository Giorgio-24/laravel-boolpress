<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'HTML', 'color' => 'primary'],
            ['name' => 'CSS', 'color' => 'danger'],
            ['name' => 'JS', 'color' => 'warning'],
            ['name' => 'PHP', 'color' => 'secondary'],
            ['name' => 'VueJS', 'color' => 'success'],
            ['name' => 'Laravel', 'color' => 'info']
        ];

        foreach ($categories as $current_category) {
            $category = new Category();

            $category->name = $current_category['name'];
            $category->color = $current_category['color'];
            $category->save();
        }
    }
}
