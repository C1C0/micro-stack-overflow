<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        return view('question.index', ['questions' => Question::all()->sortByDesc('updated_at')]);
    }

    public function show(Question $question)
    {
        return view('question.show', ['question' => $question]);
    }

    public function create()
    {
        return view('question.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'title' => ['required', 'min:5', 'max:255'],
                'body' => ['required'],
                'media' => ['file'],
            ]
        );

        $attributes['user_id'] = Auth::user()->id;

        $question = Question::create($attributes);

        return redirect('/question/' . $question->id);
    }
}
