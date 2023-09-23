<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Recipe\StoreRequest;
use App\Http\Requests\Main\Recipe\UpdateRequest;
use App\Mail\DemoMail;
use App\Models\Category;
use App\Models\NewsLetter;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use App\Service\RecipeService;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public $service;

    public function __construct(RecipeService $service)
    {
        $this->service = $service;
    }

    public function index(User $user)
    {
        return view('main.user.profile',compact('user'));
    }

    public function publicationRecipes(User $user) {
        $publicationRecipes = Recipe::fullCollect()->where('recipes.user_id', $user->id)->where('recipes.is_visible', '1')->get();

        return view('main.user.recipes.publication-recipes', compact('publicationRecipes', 'user'));

    }

    public function notPublicationRecipes(User $user) {
        $notPublicationRecipes = Recipe::fullCollect()->where('recipes.user_id', $user->id)->where('recipes.is_visible', '0')->get();

        return view('main.user.recipes.not-publication-recipes', compact('notPublicationRecipes', 'user'));
    }

    public function create(User $user) {

        $tags = Tag::all();

        return view('main.user.recipes.create', compact( 'user',  'tags'));

    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        $user_slug = auth()->user()->slug;

        return redirect()->route('user.profile', [$user_slug]);
    }

    public function edit(User $user, Recipe $recipe) {

        $tags = Tag::all();

        return view('main.user.recipes.edit', compact( 'user', 'recipe', 'tags'));
    }

    public function update(UpdateRequest $request, User $user,  Recipe $recipe) {
        $data = $request->validated();

        $recipe = $this->service->update($data, $recipe);

        return redirect()->route('user.profile', [$user->slug]);
    }

    public function delete(User $user, Recipe $recipe) {
        $recipe->delete();
        return redirect()->route('user.profile', [$user->slug]);
    }

}
