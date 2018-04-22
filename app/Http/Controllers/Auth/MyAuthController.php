<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MyAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $array = $request->all();

        $remember = $request->has('remember');

        $isAuth = Auth::attempt([
            'login' => $array['login'],
            'password' => $array['password']
        ], $remember);

        if ($isAuth) {
            return redirect()->intended('/auth/login');
        }

        return redirect()
            ->back()
            ->withInput($request->only('login', 'remember'))
            ->withErrors([
                'login' => 'Данные аутентификации не верны'
            ]);
    }
}
