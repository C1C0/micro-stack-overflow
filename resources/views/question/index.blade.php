@php /** @var App\Models\Question $questions  */ @endphp

@extends('components.layout')

@section('content')
    @foreach($questions as $question)
        <p>{{$question->title}}</p>
    @endforeach
@endsection