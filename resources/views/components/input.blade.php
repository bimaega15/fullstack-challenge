@props([
    'label' => '',
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'class' => '',
    'isHidden' => false,
])
@if ($isHidden)
    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}">
@else
    <div class="col-12">
        @if ($label != '')
            <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        @endif
        <input type="{{ $type }}" name="{{ $name }}" class="form-control {{ $class }}"
            placeholder="{{ $label != '' ? 'Masukan ' . $label . ' ...' : $placeholder }}" value="{{ $value }}">
    </div>
@endif
