<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(User $user)
    {
        $activeUser = Auth::user();
        $makeEditable = false;

        // check, if visited user is also signed in
        if ($user->is($activeUser)) {
            $makeEditable = true;
            $visitedUser = $user;
        } else {
            $visitedUser = new User;
            $visitedUser->username = $user->username;
        }

        return view('user.index', ['user' => $visitedUser, 'editable' => $makeEditable]);
    }

    /**
     * Possibility to change Either password or other data
     *
     * @param  User  $user
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(User $user, Request $request)
    {
        $attributes = [];

        // get passwords
        $password = $request->get('password') ?? false;
        $password2 = $request->get('password2') ?? false;

        // check, if we are changing password
        if ($password2 && $password) {
            if ($password !== $password2) {
                return Response::json(['status' => 'error', 'password' => ['Passwords has to match']], 400);
            }

            $attributes['password'] = $password;
        } else {
            $attributes = $request->validate(
                [
                    'username' => ['required', 'max:255', 'min:5'],
                    'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
                ]
            );
        }

        if (!$user->update($attributes)) {
            return Response::json(
                ['status' => 'error', 'message' => 'A problem occurred during updating the user'],
                500
            );
        }

        return Response::json();
    }

    public function picture(User $user, Request $request){
        $attributes = $request->validate(['picture' => ['image']]);

        $attributes['picture'] = $request->file('picture')->store('profiles/media');

        if (!$user->update($attributes)) {
            return Response::json(
                ['status' => 'error', 'message' => 'A problem occurred during updating the user'],
                500
            );
        }

        return Response::json($user);
    }

    public function remove(User $user, Request $request){
        $attributes = ['picture' => null];
        $user->update($attributes);
        return Response::json();
    }
}
