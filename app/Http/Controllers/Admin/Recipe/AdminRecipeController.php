<?php

namespace App\Http\Controllers\Admin\Recipe;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Recipe\StoreRequest;
use App\Http\Requests\Admin\Recipe\UpdateRequest;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use App\Service\RecipeService;
use Illuminate\Support\Facades\Storage;


class AdminRecipeController extends Controller
{

    public $service;

    public function __construct(RecipeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {

        $recipes = Recipe::all();

        return view('admin.recipe.index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.recipe.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.recipe.index');
    }

    public function show(Recipe $recipe)
    {
        return view('admin.recipe.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.recipe.edit', compact('recipe', 'categories', 'tags'));
    }

    public function update(UpdateRequest $request, Recipe $recipe)
    {
        $data = $request->validated();
        $recipe = $this->service->update($data, $recipe);

        return redirect()->route('admin.recipe.show', [$recipe->slug]);
    }

    public function delete(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('admin.recipe.index');
    }
}
