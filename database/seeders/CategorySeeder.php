<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Горячие блюда', 'slug' => 'goryachie-blyuda'],
            ['title' => 'Холодные блюда', 'slug' => 'holodnye-blyuda'],
            ['title' => 'Десерты', 'slug' => 'deserty'],
            ['title' => 'Выпечка', 'slug' => 'vypechka'],
            ['title' => 'Напитки', 'slug' => 'drinks']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
