@props(['action' => '', 'method' => 'GET', 'noClass' => ''])

<form action="{{$action}}"
      method="{{$method}}"
        {{$attributes(['class' => 'py-3 rounded'])}}
>
    @csrf


    {{ $noClass }}


    <div class="w-50 m-auto">
        {{ $slot }}
    </div>

</form>