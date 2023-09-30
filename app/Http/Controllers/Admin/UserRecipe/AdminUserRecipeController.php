<?php

namespace App\Http\Controllers\Admin\UserRecipe;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRecipe\FeedbackRequest;
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


class AdminUserRecipeController extends Controller
{

    public $service;

    public function __construct(RecipeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {

        $recipes = Recipe::fullCollect()->where('recipes.is_visible', '0')->get();

        return view('admin.user-recipe.index', compact('recipes'));
    }


    public function show(Recipe $recipe)
    {
        return view('admin.user-recipe.show', compact('recipe'));
    }

    public function published(Recipe $recipe) {

        $recipe->update(['is_visible' => '1']);

        $mailData = [
            'title' => 'Вышел новый рецепт: ' . $recipe['title'],
            'link' => '<a href="https://foodking.leonprog.ru/recipe/'.$recipe['slug'].'">Перейти к рецепту</a>',
        ];

        // рассылка о выходе нового рецепта
        $newsletters = NewsLetter::all();

        foreach ($newsletters as $newsletter) {
            Mail::to($newsletter->email)->send(new DemoMail($mailData));
        }

        return redirect()->route('admin.user-recipe.index');

    }

    public function feedback(FeedbackRequest $request, Recipe $recipe) {

        $data = $request->validated();

        $email = $recipe->user->email;

        $mailData = [
            'title' => 'Уважаемый ' . $recipe->user->username,
            'feedback' => 'Замечание:<br><p>'.$data['feedback'].'</p><p>Вы можете все исправить и отправить на проверку!</p><p><a href="https://foodking.leonprog.ru/user/'.$recipe->user->slug.'/recipes/edit/'.$recipe->slug.'">Перейти к рецепту</a></p>'
        ];

        Mail::to($email)->send(new DemoMail($mailData));

        return redirect()->route('admin.user-recipe.index');

    }


}
