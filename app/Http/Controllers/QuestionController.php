<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    public function index()
    {
        return view('question.index', ['questions' => Question::all()->sortByDesc('created_at')]);
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
                'media' => ['image'],
            ]
        );

        $attributes['media'] = $request->file('media')->store('questions/media');

        $attributes['user_id'] = Auth::user()->id;

        $question = Question::create($attributes);

        return redirect('/question/'.$question->id);
    }

    public function edit(Question $question)
    {
        $this->checkUser($question);
        return view('question.edit', ['question' => $question]);
    }

    public function update(Question $question, Request $request)
    {
        $this->checkUser($question);

        $attributes = $request->validate(
            [
                'title' => ['required', 'min:5', 'max:255'],
                'body' => ['required'],
                'media' => ['image'],
            ]
        );

        $attributes['media'] = $request->file('media')->store('questions/media');

        $question->update($attributes);

        return redirect('/question/'.$question->id);
    }

    /**
     * Checks if question was created by signed in user
     *
     * @param  Question  $question
     * @throws ValidationException
     */
    private function checkUser(Question $question){
        // enable editing only posts of signed in user
        if (!Auth::user()->is($question->user)) {
            throw ValidationException::withMessages(
                [
                    'user' => 'This user is not allowed editing this question'
                ]
            );
        }
    }
}
