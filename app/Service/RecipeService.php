<?php

namespace App\Service;

use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecipeService
{
    public function store($data) {
        try {
            DB::beginTransaction();

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $data['image'] = Storage::disk('public')->put('/recipe_images', $data['image']);


            if ( (!isset($data['is_visible'])) and (auth()->user()->role != 'admin') ) {
                $data['is_visible'] = '0';
            }

            $data['user_id'] = auth()->user()->id;


            $recipe = Recipe::firstOrCreate($data);

            $recipe->tags()->attach($tagIds);

            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $recipe) {
        try {
            DB::beginTransaction();


            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            if (isset($data['image'] )) {
                $data['image'] = Storage::disk('public')->put('/recipe_images', $data['image']);
            }

            if ( (!isset($data['is_visible'])) and (auth()->user()->role != 'admin') ) {
                $data['is_visible'] = '0';
            }

            $data['user_id'] = auth()->user()->id;

            // Правильная структура хранения процессов приготовления и ингредиентов
            if (substr($data['process'], -1) != '&') {
                $data['process'] = $data['process'].'&';
            }

            if (substr($data['ingredients'], -1) != '&') {
                $data['ingredients'] = $data['ingredients'].'&';
            }

            

            $recipe->update($data);
            // Обноваляет теги у рецепта, удаляя старые (невыбранные) и добавляя новые
            $recipe->tags()->sync($tagIds);

            DB::commit();

            return $recipe;

        }catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
