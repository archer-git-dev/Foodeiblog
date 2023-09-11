<?php


namespace App\View\Composers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {

        $categories = cache()->remember('categories', now()->addMinutes(20), function () {
            return Category::join('recipes', 'categories.id', '=', 'recipes.category_id')
                ->select('categories.title', 'categories.slug', DB::raw('count(recipes.title) as recipe_count'))
                ->groupByRaw('categories.title, categories.slug')
                ->get();
        });

        $view->with('categories', $categories);
    }
}
