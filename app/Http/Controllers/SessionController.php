<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $credentials = request()->validate(
            [
                'email' => ['required', 'email'],
                'password' => 'required',
            ]
        );

        if (auth()->attempt($credentials)) {
            // regenerate SESSION ID to prevent Session Fixation
            session()->regenerate();

//           ->with(Config::get('constants.SESSION.SUCCESS'), 'Welcome Back!');
            return redirect('/');
        }

        // if user not found
        throw ValidationException::withMessages(
            [
                'email' => 'Your provided credentials could not be verified',
            ]
        );
    }

    public function destroy()
    {
        auth()->logout();

//        ->with(Config::get('constants.SESSION.SUCCESS'), 'Goodbye !')
        return redirect('/');
    }
}
