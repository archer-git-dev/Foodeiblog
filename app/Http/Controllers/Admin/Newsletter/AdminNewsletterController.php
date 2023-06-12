<?php

namespace App\Http\Controllers\Admin\Newsletter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Newsletter\StoreRequest;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class AdminNewsletterController extends Controller
{
    public function index()
    {

        $newsletters = Newsletter::all();

        return view('admin.newsletter.index', compact('newsletters'));
    }

    public function create()
    {
        return view('admin.newsletter.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Newsletter::firstOrCreate($data);

        return redirect()->route('admin.newsletter.index');
    }


    public function delete(newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->route('admin.newsletter.index');
    }
}
