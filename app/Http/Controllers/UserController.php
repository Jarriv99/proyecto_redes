<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $fields = $request->toArray();
        $fields['password'] = bcrypt($request->get('password'));
        $user = new User($fields);
        $user->save();
        $token = $user->createToken('TutsForWeb')->accessToken;
        $userArray = $user->toArray();
        $userArray['token'] = $token;


        return $userArray;
    }


    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            $user = auth()->user()->toArray();
            $user['token'] = $token;
            return $user;
        }
        abort(204);

    }
}
