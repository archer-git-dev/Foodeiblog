<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\RestorePasswordRequest;
use App\Http\Requests\Main\RestoreRequest;
use App\Http\Requests\Main\SignInRequest;
use App\Http\Requests\Main\SignUpRequest;
use App\Mail\DemoMail;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
                return back()->withErrors('Неверно введены E-mail или пароль')->withInput($request->all());
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

    public function forget() {

        return view('main.forget');

    }

    public function restore(RestoreRequest $request) {
        $data = $request->validated();

        $email = $data['email'];

        $user = User::where('email', $email)->first();

        $hasUser = false;
        if ($user) {
            $hasUser = true;

            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

        }

        return view('main.forget', compact('hasUser', 'email' ));

    }

    public function restorePasswordPage(User $user) {
        return view('main.restore-password', compact('user'));
    }

    public function restorePassword(RestorePasswordRequest $request, User $user) {

        $data = $request->validated();

        if ($user) {

            $data['password'] = Hash::make($data['password']);

            $user->update($data);

        }

        return redirect()->route('signin');

    }

}
