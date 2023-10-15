<?php

namespace App\Service;

use App\Http\Requests\Main\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService
{
    public function store($data) {
        try {
            DB::beginTransaction();


            if (isset($data['avatar'])) {
                $data['avatar'] = Storage::disk('public')->put('/avatars', $data['avatar']);
            }

            $data['password'] = Hash::make($data['password']);

            $data['verified'] = '1';

            $data['remember_token'] = Str::random(30);

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

            $data['verified'] = '0';

            User::firstOrCreate($data);

            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }



}
