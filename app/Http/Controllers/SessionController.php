<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    function create()
    {

        return view('auth.login');
    }

    function store()
    {
        //vaildate
        $attributes = request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        //attempt to login the user


        if(! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email'=>'Sorry,those credentials do not match'

            ]);

        }
        //regenerate the session token
        request()->session()->regenerate();
        //redirect
        return redirect('/jobs');
    }

    function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
