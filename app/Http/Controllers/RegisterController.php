<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $request = $request->user;

        $user =  User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['encrypted_password']),
            'phone' => $request['phone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'country' => $request['country'],
            'name' => $request['name'],
            'postcode' => $request['postcode'],
        ]);


        // $token = auth()->attempt([$request['email'],  $request['encrypted_password']]);

        // $credentials = $request->only('email', 'password');

        // $token = Auth::attempt($credentials);
        $token = '';

        return response()->json([
            'email' => $user->email,
            'token' =>   $token,
            'username' => $user->username
        ], 201);
    }
}
