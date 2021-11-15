@php /** @var App\Models\Question $question  */ @endphp

@extends('components.layout')

@section('content')
    <div class="border-bottom pb-3">
        <x-questions.question-full :question="$question"/>
    </div>
    <h4 class="mt-3">Answers</h4>
    @foreach($question->answers as $answer)
        <x-answers.answer :answer="$answer" :num="$loop->iteration" class="mb-2"/>
    @endforeach
@endsection