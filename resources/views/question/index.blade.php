@php /** @var App\Models\Question $questions  */ @endphp

@extends('components.layout')

@section('content')
    @foreach($questions as $question)
        <x-question :question="$question" class="mb-3"></x-question>
    @endforeach
@endsection