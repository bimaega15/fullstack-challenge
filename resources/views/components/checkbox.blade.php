@props(['label', 'name', 'value' => 1, 'checked' => ''])
<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="{{ $name }}" value="{{ $value }}"
            id="{{ $name }}" {{ $checked }}>
        <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
    </div>
</div>
