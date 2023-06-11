<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function getAllRecipes() {

        $recipes = Recipe::paginate(1);
        $categories = Category::all();

        return view('main.recipes', compact('recipes', 'categories'));
    }

    public function getRecipesByCategory(Category $category) {

        $recipes = Recipe::where('category_id', $category->id)->paginate(1);
        $categories = Category::all();

        return view('main.recipes', compact('recipes', 'categories', 'category'));
    }

    public function getRecipe(Recipe $recipe) {

        $comments = Comment::where('status', '1')
            ->where('recipe_id', $recipe->id)
            ->get();


        return view('main.recipe', compact('recipe', 'comments'));
    }
}
