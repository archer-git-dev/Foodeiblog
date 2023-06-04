<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['title' => 'Мясо', 'slug' => 'myaso'],
            ['title' => 'Птица', 'slug' => 'ptica'],
            ['title' => 'Овощи', 'slug' => 'ovoschi'],
            ['title' => 'Фрукты', 'slug' => 'frukty'],
            ['title' => 'Зелень', 'slug' => 'zelen'],
            ['title' => 'Мука', 'slug' => 'muka'],
            ['title' => 'Крупы', 'slug' => 'krupy'],
            ['title' => 'Яйца', 'slug' => 'yayca'],
            ['title' => 'Молочные продукты', 'slug' => 'molochnye-produkty'],
            ['title' => 'Сахар', 'slug' => 'sahar'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
