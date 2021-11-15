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

            <x-questions.by-user :username="$question->user->username" :userId="$question->user->id" class="mt-5"/>
        </div>
        {{--        @dd($question->media)--}}
        @if($question->media ?? false)
            <hr>
            <div class="card-media">
                <h5>Media</h5>
                <div style="background-image: url('{{asset('storage/'.$question->media)}}')"></div>
            </div>
        @endif
    </div>
</div>