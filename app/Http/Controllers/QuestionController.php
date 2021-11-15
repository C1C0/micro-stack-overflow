<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        return view('question.index', ['questions' => Question::all()]);
    }

    public function show(Question $question){
        return view('question.show', ['question' => $question]);
    }
}
