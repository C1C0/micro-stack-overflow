@props([
    'name',
    'required' => false,
    'label' => ucwords($name),
    'placeholder' => '',
    'initValue' => null,
    'rows' => 5
    ])

<div class="mb-3">
    <div class="input-group ">
    <span class="input-group-text bg-white text-primary fw-bold border-1"
          id="basic-addon1">{{$label}}:</span>

        <textarea name="{{ $name }}"
                  id="{{ $name }}"
                  aria-label="{{ $name }}"
                  placeholder="{{$placeholder}}"
                  class="form-control bg-white w-25"
                  rows="{{$rows}}"
                {{ $required ? 'required' : '' }}>{{old($name, $initValue)}}</textarea>
    </div>

    @error($name)
    <p class="text-danger">{{$message}}</p>
    @enderror

</div>