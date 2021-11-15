@props(['answer', 'num'])

<div {{$attributes(['class' => "card"])}}>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between card-title">
            <div class="d-flex align-content-center justify-content-between flex-grow-1 flex-shrink-0 me-3">
                <h5 class="me-5">#{{$num}} -- By: <span class="fw-bold">{{$answer->user->username}}</span></h5>
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
            <x-forms.form method="POST" action="/question/{{$answer->question->id}}/answer/{{$answer->id}}">
                @method('PATCH')

                <x-slot name="noClass">
                    <x-forms.textarea-default name="body" required :initValue="$answer->body"/>
                    <x-forms.submit label="Save" />
                </x-slot>

            </x-forms.form>
        </div>
    </div>
</div>