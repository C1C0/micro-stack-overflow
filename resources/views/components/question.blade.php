@props(['question'])

<div {{$attributes(['class' => 'card'])}}>
    <div class="card-body d-flex flex-column">
        <div class="card-title d-flex align-items-center justify-content-between">
            <x-title>{{$question->title}}</x-title>
            <x-votes>{{$question->votes}}</x-votes>
        </div>
        <div class="card-text">
            <x-by-user :name="$question->user->name"/>
        </div>
    </div>
</div>