<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login(Request $request)
    {

        $request -> validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $request['email'])->first();

        // Valida lo siguiente
        //  * Si no existe un usuario
        //  * Si no es el mismo password
        if (!$user  || !Hash::check($request['password'], $user->password))
        {
            return response()->json([
                'message'=>'The provided credentials are incorrect.',
                'code'=> 404
            ]);
        }

        // Valida lo siguiente
        //  * Si el token de usurio no es vacío
        if (!$user->tokens->isEmpty())
        {
            return response()->json([
                'message'=>'User is already authenticated.',
                'code'=> 403
            ]);
        }


        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message'=>'Successful authentication.',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }






    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json([
            'message'=>'Logged out.',
            'code'=> 403
        ]);

    }
}
