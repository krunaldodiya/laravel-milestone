<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;

use App\User;

class UserController extends Controller
{
    public function me()
    {
        $user = auth('api')->user();

        return compact('user'); 
    }

    public function authenticate(AuthRequest $request)
    {
        $data = $request->all();

        $user = User::where(['mobile' => $data['mobile']])->first();

        return $user ? $this->login($data, $user) : $this->register($data);
    }

    private function login($data, $user)
    {
        $uid = $data['uid'];

        if ($uid != $user->uid) {
            $errors = [
                "message"=> "The given data was invalid.",
                "errors"=> [
                    "uid"=> [
                        "Device already registered."
                    ]
                ]
            ];

            return response($errors, 403);
        }

        return $this->generateToken($user->id);
    }

    private function register($data)
    {
        $user = User::create($data);

        return $this->generateToken($user->id);
    }

    private function generateToken($user_id)
    {
        $user = User::find($user_id);
        $token = auth('api')->tokenById($user_id);

        return compact('user', 'token');
    }
}
