<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        }else{
            $visitedUser = new User;
            $visitedUser->username = $user->username;
        }

        return view('user.index', ['user' => $visitedUser, 'editable' => $makeEditable]);
    }
}
