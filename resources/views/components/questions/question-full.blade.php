@props(['question'])

<div {{$attributes(['class' => "card"])}}>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between card-title mb-4">
            <div class="d-flex flex-column">
                <h4 class="me-4">{{$question->title}}</h4>

                @auth
                    @if(auth()->user()->is($question->user))
                        {{-- Owner can Edit --}}
                        <a href="/question/{{$question->id}}/edit">Edit</a>
                    @endif
                @endauth
            </div>


            <x-questions.votes>{{$question->votes}}</x-questions.votes>
        </div>
        <div class="card-text">
            {{$question->body}}

            <x-questions.by-user :username="$question->user->username" class="mt-5"/>
        </div>
    </div>
</div>