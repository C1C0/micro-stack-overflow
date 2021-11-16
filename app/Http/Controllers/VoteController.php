<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class VoteController extends Controller
{
    public function question(Request $request, Question $question)
    {
        $vote = null;

        // check if vote exists
        $attributes = $request->validate(['vote' => 'required']);


        // check, if vote integer
        if (!is_numeric($attributes['vote'])) {
            throw ValidationException::withMessages(['vote' => 'Vote has to be an integer']);
        }

        $attributes['vote'] = intval($attributes['vote']);

        // check if vote had been provided for voted question
        // If not, just assign vote
        if (empty($question->voters->find(Auth::user()->id))) {
            $question->voters()->attach(Auth::user()->id, $attributes);
        }else{
            // if vote already made, deatach that one first and attach new one
            $question->voters()->detach(Auth::user()->id);
            $question->voters()->attach(Auth::user()->id, $attributes);
        }

        return back();

    }
}
