<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Question $question, Request $request)
    {
        $attributes = $request->validate(['body' => ['required', 'min:5']]);

//        Answer::create([$attributes['body'], Auth::user()->id, $question->id]);
        $answer = new Answer();
        $answer->question_id = $question->id;
        $answer->user_id = Auth::id();
        $answer->body = $attributes['body'];

        $answer->save();


        return back();
    }
}
