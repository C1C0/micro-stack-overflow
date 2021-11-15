@props(['answer', 'num'])

<div {{$attributes(['class' => "card"])}}>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between card-title">
            <div class="d-flex align-content-center justify-content-between flex-grow-1 flex-shrink-0 me-3">
                <h5 class="me-5">#{{$num}} -- By: <span class="fw-bold">{{$answer->user->username}}</span><span class="ms-3">({{$answer->votes}})</span></span></h5>
                <p class="text-black-50 mb-0">{{$answer->created_at}}</p>
            </div>

            @auth
                @if(auth()->user()->is($answer->user))
                    {{-- Owner can Edit --}}
                    <a href="/question/{{$answer->question->id}}?answerEdit={{$answer->id}}">Edit</a>
                @endif
            @endauth
{{--            <x-forms.submit label="edit" class="flex-shrink-1 flex-grow-0 w-max-content" />--}}

        </div>
        <div class="card-text">
            {{$answer->body}}
        </div>
    </div>
</div>