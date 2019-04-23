<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;

use App\User;

class UserController extends Controller
{
    public function getUserById($user_id)
    {
        return User::with('school')->where(['id' => $user_id])->first();
    }
    
    public function me()
    {
        $user = $this->getUserById(auth('api')->user()->id);

        return ['user' => $user];
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

        if ($user->uid == null) {
            $user->update(['uid' => $data['uid'], 'status'=> false]);
        }

        if ($user->uid != null && $uid != $user->uid) {
            $errors = [
                "errors"=> [
                    "uid"=> [
                        "Device already registered."
                    ]
                ]
            ];

            return response($errors, 402);
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
        $user = $this->getUserById($user_id);
        $token = auth('api')->tokenById($user_id);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 * 24 * 365,
            'user' => $user
        ]);
    }
}
