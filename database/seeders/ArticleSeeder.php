<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::factory(10)->create();

        foreach ($articles as $article) {
            Photo::factory(fake()->numberBetween(1, 3))->create([
                'imaginable_id' => $article->id,
                'imaginable_type' => Article::class,
            ]);
        }
    }
}
