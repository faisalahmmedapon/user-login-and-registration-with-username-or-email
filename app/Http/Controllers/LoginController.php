<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLoginRequest;

class LoginController extends Controller
{

    public function show()
    {
        return view('auth.login');
    }


    public function login(StoreLoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }


    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
