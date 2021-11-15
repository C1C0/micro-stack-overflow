@props(['action' => '', 'method' => 'GET'])

<form action="{{$action}}"
      method="{{$method}}"
      {{$attributes(['class' => 'py-3 rounded'])}}
>
    @csrf

    <div class="w-50 m-auto">
        {{ $slot }}
    </div>
</form>