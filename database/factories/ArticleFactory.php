<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(5);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'annotation' => $this->faker->paragraph(4),
            'journal_name' => $this->faker->company() . ' jurnali',
            'pub_date' => $this->faker->date(),
            'file_url' => 'maqola/dummy_article.pdf', // Soxta fayl nomi
            'author_id' => 1,
        ];
    }
}
