<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
//        $user = $request->user();

        if (Auth::check()) {
            echo 'yess, ya authtorizovan' . '<br>';
        } else {
            $user = User::find(4);

            Auth::login($user);
//            Auth::loginUsingId(4);

//            Auth::logout();


        }

        if (Auth::viaRemember()) {
            echo 'Auth::viaRemember';
        }

        echo Auth::id() . '<br>';

        dump($user);
        return view('home');
    }

    public function create()
    {

    }
}
