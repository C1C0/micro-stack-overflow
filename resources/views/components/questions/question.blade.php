@props(['question'])

<div {{$attributes(['class' => 'card'])}}>
    <div class="card-body d-flex flex-column">
        <div class="card-title d-flex align-items-center justify-content-between">
            <x-questions.title :questionId="$question->id">{{$question->title}}</x-questions.title>
            <x-questions.votes>{{$question->voters->count()}}</x-questions.votes>
        </div>
        <div class="card-text">
            <x-questions.by-user :username="$question->user->username" :userId="$question->user->id"/>
        </div>
    </div>
</div>