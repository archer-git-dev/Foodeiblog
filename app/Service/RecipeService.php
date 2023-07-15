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
