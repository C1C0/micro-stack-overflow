@props([
    'name',
    'required' => false,
    'initValue' => null,
    'rows' => 5
    ])


<div class="mb-1">
        <textarea name="{{ $name }}"
                  id="{{ $name }}"
                  aria-label="{{ $name }}"
                  rows="{{$rows}}"
                  class="w-100"
                {{ $required ? 'required' : '' }}>{{old($name, $initValue)}}</textarea>

    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
