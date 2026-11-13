@props(['name', 'label', 'opciones', 'value' => null])

<label class="form-label fw-bold" for="{{ $name }}">
    {{ $label }} <span class="text-danger">*</span>
</label>
<select id="{{ $name }}" name="{{ $name }}"
        {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}>
    <option value="">Seleccione...</option>
    @foreach($opciones as $clave => $texto)
        @php $valor = array_is_list($opciones) ? $texto : $clave; @endphp
        <option value="{{ $valor }}" @selected((string) old($name, $value) === (string) $valor)>{{ $texto }}</option>
    @endforeach
</select>
@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror