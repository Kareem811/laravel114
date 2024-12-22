<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function register(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            "address" => $request->address,
            "phone" => $request->phone,
            "gender" => $request->gender
        ]);
        return Response::json(["message" => "Registered Successfully"]);
    }
    public function login(Request $request)
    {
        $x = $request->only('email', 'password');
        if (!Auth::attempt($x)) {
            return Response::json(['message' => "Invalid"]);
        }
        $user = Auth::user();
        $token = $user->createToken("token")->plainTextToken;
        // $cookie = cookie('jwt', $token, 1);
        // return Response::json(['message' => "Logged", "user" => $user])->withCookie($cookie);
        return Response::json(['message' => "logged Successfully", "user" => $user, "token" => $token]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        $cookie = Cookie::forget('jwt');
        return Response::json(["msg" => "logged Out Successfully"])->withCookie($cookie);
    }
    public function user(Request $request)
    {
        $user = $request->user();
        if (Auth::check()) {
            return Response::json([
                "message" => "this token for this user",
                "user" => $user
            ]);
        }
        return Response::json([
            "message" => "this token is Expired",
        ]);
        // $user = $request->user();
        // if ($user) {
        //     return Response::json([
        //         "message" => "this token for this user",
        //         "user" => $user
        //     ]);
        // }
        // return Response::json([
        //     "message" => "this token is Expired",
        // ]);
    }
}
