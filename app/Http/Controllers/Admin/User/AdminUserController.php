<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {

        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        dd($data);

        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, user $user)
    {
        $data = $request->validated();
        dd($data);

        return redirect()->route('admin.user.show', [$user->slug]);
    }

    public function delete(user $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
