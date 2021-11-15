@php /** @var App\Models\Question $questions  */ @endphp

@extends('components.layout')

@section('content')
    @foreach($questions as $question)
        <x-questions.question :question="$question" class="mb-3" />
    @endforeach
@endsection