@props(['votedFor', 'vote' => 'none', 'questionId'])

@php

    // find out, if user voted
    if(!empty($votedFor)){
        // find out, what type of vote it was
        switch ($votedFor->pivot->vote){
            case 1:
                $vote = 'up';
                break;
            case 0:
                $vote = 'none';
                break;
            case -1:
                $vote = 'down';
                break;
            default:
                $vote = 'none';
        }
    }

@endphp

<div class="d-flex text-center text-primary align-items-center">
    <p class="me-3 mt-0 mb-0">Votes: </p>
    <div class="d-flex flex-column">
        @auth
            <x-forms.form action="/vote/question/{{$questionId}}" method="POST">
                <input type="hidden" name="vote" value="1">
                <button type="submit" class="p-0 m-0 bg-transparent border-0">
                    <x-icons.arrow direction="up" class="m-auto {{$vote === 'up' ? 'selected' : ''}}"></x-icons.arrow>
                </button>
            </x-forms.form>
        @endauth
        <span class="fw-bold">{{$slot}}</span>
        @auth
                <x-forms.form action="/vote/question/{{$questionId}}" method="POST">
                    <input type="hidden" name="vote" value="-1">
                    <button type="submit" class="p-0 m-0 bg-transparent border-0">
                        <x-icons.arrow direction="down"
                                       class="m-auto {{$vote === 'down' ? 'selected' : ''}}"></x-icons.arrow>
                    </button>
                </x-forms.form>
        @endauth
    </div>
</div>
