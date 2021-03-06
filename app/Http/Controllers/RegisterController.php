<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'username' => ['required', 'max:255', 'min:5', Rule::unique('users', 'username')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => [
                    'required',
                    'max:255',
                    Password::default(),
                ],
            ]
        );

        $user = User::create($attributes);
        auth()->login($user);

//        ->with(Config::get('constants.SESSION.SUCCESS'), 'Your account has been created.')
        return redirect('/');
    }
}
