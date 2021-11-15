@props(['question'])

<div {{$attributes(['class' => 'card'])}}>
    <div class="card-body d-flex flex-column">
        <div class="card-title d-flex align-items-center justify-content-between">
            <x-questions.title :questionId="$question->id">{{$question->title}}</x-questions.title>
            <x-questions.votes>{{$question->votes}}</x-questions.votes>
        </div>
        <div class="card-text">
            <x-questions.by-user :username="$question->user->username"/>
        </div>
    </div>
</div>