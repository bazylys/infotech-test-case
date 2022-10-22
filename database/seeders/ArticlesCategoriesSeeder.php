<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        Article::all()->each(function ($article) use ($categories) {
            $article->categories()->attach(
                $categories->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
