<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function getAllRecipes(Request $request) {

        $search = mb_strtolower($request->q);

        if ($search) {

            $recipes = Recipe::fullCollect()->where(function ($query) use ($search) {

                $query->where('recipes.title', 'like', "%$search%")
                    ->orWhere('recipes.subtitle', 'like', "%$search%")
                    ->orWhere('recipes.ingredients', 'like', "%$search%");

            })->paginate(100);


        }else {
            $recipes = Recipe::fullCollect()->paginate(5);
        }


        return view('main.recipes', compact('recipes'));
    }


    public function getRecipesByCategory(Category $category) {

        $recipes = Recipe::fullCollect()->where('recipes.category_id', $category->id)->paginate(5);

        return view('main.recipes', compact('recipes',  'category'));
    }

    public function getRecipe(Recipe $recipe) {

        $comments = Comment::where('status', '1')
            ->where('recipe_id', $recipe->id)
            ->get();


        return view('main.recipe', compact('recipe', 'comments'));
    }
}
