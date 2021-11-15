@php /** @var App\Models\Question $question  */ @endphp

@extends('components.layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between card-title mb-4">
                <h4 class="me-4">{{$question->title}}</h4>
                <x-questions.votes>{{$question->votes}}</x-questions.votes>
            </div>
            <div class="card-text">
                {{$question->body}}

                <x-questions.by-user :username="$question->user->username" class="mt-5"/>
            </div>
        </div>
    </div>

@endsection