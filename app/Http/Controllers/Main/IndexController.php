<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\NewsletterRequest;
use App\Models\Category;
use App\Models\NewsLetter;
use App\Models\Recipe;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {

        $categories = Category::all();
        $recipes = Recipe::latest()->take(9)->get();
        $popular_recipes = Recipe::get()->random(8);

        return view('main.index', compact('categories', 'recipes', 'popular_recipes'));
    }

    public function store(NewsletterRequest $request) {
        $data = $request->validated();

        unset($data['policy']);

        NewsLetter::create($data);

        return redirect()->back();
    }
}
