<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{

    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {

        $users = User::where('role', 'user')->get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

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
        $user = $this->service->update($data, $user);

        return redirect()->route('admin.user.show', [$user->slug]);
    }

    public function delete(user $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }

    public function deleteNotVerified() {
        $users = User::where('verified', '0')->get();

        foreach ($users as $user) {
            $user->delete();
        }

        return redirect()->route('admin.user.index');

    }

}
