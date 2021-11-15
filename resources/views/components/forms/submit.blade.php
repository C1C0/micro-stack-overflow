@props(['name' => '', 'label' => ($name ?? false ? ucwords($name) : '')])

<div class="input-group mb-3">
    <button type="submit"
            {{ $name ?? false ? "name='$name' id='$name'" : ''  }}
            class="bg-primary text-white form-control border-0"
    >{{$label}}</button>
</div>