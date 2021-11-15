@props(['questionId'])

<a href="/question/{{$questionId}}" class="text-decoration-none text-black">
    <h4 {{$attributes(['class'])}}>
        {{$slot}}
    </h4>
</a>
