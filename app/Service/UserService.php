<?php

namespace App\Service;

use App\Http\Requests\Main\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function store($data) {
        try {
            DB::beginTransaction();


            if (isset($data['avatar'])) {
                $data['avatar'] = Storage::disk('public')->put('/avatars', $data['avatar']);
            }

            $data['password'] = Hash::make($data['password']);


            User::firstOrCreate($data);

            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $user) {
        try {
            DB::beginTransaction();



            if (isset($data['avatar'] )) {
                $data['avatar'] = Storage::disk('public')->put('/avatars', $data['avatar']);
            }else {
                $data['avatar'] = $data['old_avatar'];
            }


            unset($data['old_avatar']);

            $user->update($data);

            DB::commit();

            return $user;

        }catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function registration($data) {

        try {
            DB::beginTransaction();


            if (isset($data['avatar'])) {
                $data['avatar'] = Storage::disk('public')->put('/avatars', $data['avatar']);
            }


            $data['password'] = Hash::make($data['password']);


            $user = User::firstOrCreate($data);

            Auth::login($user);

            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }



}
