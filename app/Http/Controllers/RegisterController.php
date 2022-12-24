<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function show()
    {
        return view('auth.register');
    }

    public function register(StoreUserRegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
