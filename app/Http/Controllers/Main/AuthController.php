<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\SignInRequest;
use App\Http\Requests\Main\SignUpRequest;
use App\Service\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function signin() {
        return view('main.signin');
    }

    public function signup() {
        return view('main.signup');
    }

    public function login(SignInRequest $request) {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            if (!Auth::attempt($data)) {
                return back()->withErrors('Неверно введены имя пользователя или пароль')->withInput($request->all());
            }

            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }


        return redirect()->route('home');
    }

    public function registration(SignUpRequest $request) {

        $data = $request->validated();

        $this->service->registration($data);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

}
