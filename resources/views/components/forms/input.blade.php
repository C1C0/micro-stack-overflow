@props(['type' => 'text', 'name', 'required' => false, 'label' => ucwords($name), 'placeholder' => ''])

<div class="input-group mb-3">
    <span class="input-group-text bg-white text-primary fw-bold border-1"
          id="basic-addon1">{{$label}}:</span>
    <input name="{{ $name }}"
           id="{{ $name }}"
           type="{{$type}}"
           aria-label="{{ $name }}"
           placeholder="{{$placeholder}}"
           class="form-control bg-white w-25"
            {{ $required ? 'required' : '' }}>
</div>