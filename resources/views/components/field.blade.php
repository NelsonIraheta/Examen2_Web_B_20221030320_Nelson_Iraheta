@props(['name', 'label', 'type' => 'text', 'value' => null, 'required' => true])

<label class="form-label fw-bold" for="{{ $name }}">
    {{ $label }} @if($required)<span class="text-danger">*</span>@endif
</label>
<input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
       value="{{ old($name, $value) }}"
       {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>
@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror