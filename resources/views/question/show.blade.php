@php /** @var App\Models\Question $question  */ @endphp

@extends('components.layout')

@section('content')
    <div class="border-bottom pb-3">
        <x-questions.question-full :question="$question"/>

        @auth
            <x-answers.add-answer class="mt-4" :questionId="$question->id"/>
        @else
            <p class="mt-4">If you want to contribute to this discussion, <a href="/login" class="text-primary fw-bold">Log In</a> or
                <a href="/register" class="text-primary fw-bold">Register</a>
            </p>
        @endauth
    </div>
    <h4 class="mt-3">Answers</h4>
    @foreach($question->answers as $answer)
        <x-answers.answer :answer="$answer" :num="$loop->iteration" class="mb-2"/>
    @endforeach
@endsection