<?php

namespace App\Http\Controllers\Admin\Recipe;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Recipe\StoreRequest;
use App\Http\Requests\Admin\Recipe\UpdateRequest;
use App\Mail\DemoMail;
use App\Models\Category;
use App\Models\NewsLetter;
use App\Models\Recipe;
use App\Models\Tag;
use App\Service\RecipeService;
use Illuminate\Support\Facades\Mail;
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

        $mailData = [
            'title' => 'Вышел новый рецепт: ' . $data['title'],
            'link' => '<a href="https://foodking.leonprog.ru/recipe/'.$data['slug'].'">Перейти к рецепту</a>',
        ];

        // рассылка о выходе нового рецепта
        $newsletters = NewsLetter::all();

        foreach ($newsletters as $newsletter) {
            Mail::to($newsletter->email)->send(new DemoMail($mailData));
        }


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
