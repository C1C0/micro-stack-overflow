@props(['userId', 'username'])

<p {{$attributes(['class' => 'mb-0'])}}>
    <span class="pe-1 fw-bold">by:</span> <a href="/user/{{ $userId }}" class="bg-info text-white py-1 px-3 rounded w-max-content bg-opacity-50">{{$username}}</a>
</p>