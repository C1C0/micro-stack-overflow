@props(['question'])

<div {{$attributes(['class' => 'card'])}}>
    <div class="card-body d-flex flex-column">
        <div class="card-title d-flex align-items-center justify-content-between">
            <x-questions.title :questionId="$question->id">{{$question->title}}</x-questions.title>
            <x-questions.votes :questionId="$question->id" :votedFor="$question->voters->find(auth()->user()->id ?? 0)">{{($question->voters->where('pivot.vote', '>', 0)->count() - $question->voters->where('pivot.vote', '<', 0)->count())}}</x-questions.votes>
        </div>
        <div class="card-text">
            <x-questions.by-user :username="$question->user->username" :userId="$question->user->id"/>
        </div>
    </div>
</div>