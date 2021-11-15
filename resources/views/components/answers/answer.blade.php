@props(['answer', 'num'])

<div {{$attributes(['class' => "card"])}}>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between card-title mb-4">
            <div class="d-flex flex-column">
                <h5>#{{$num}} -- By: <span class="fw-bold">{{$answer->user->username}}</span></h5>
                <p class="text-black-50">{{$answer->created_at}}</p>

                @auth
                    @if(auth()->user()->is($answer->user))
                        {{-- Owner can Edit --}}
                        <a>Edit</a>
                    @endif
                @endauth
            </div>

        </div>
        <div class="card-text">
            {{$answer->body}}
        </div>
    </div>
</div>