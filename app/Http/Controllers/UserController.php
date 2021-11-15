<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = new User;
        $activeUser = auth()->user();

        $user->username = $activeUser->username;
        $user->email = $activeUser->email;

        return view('user.index', ['user' => $user]);
    }
}
