@props(['label' => '', 'name', 'value' => ''])
<div class="col-12">
    @if ($label != '')
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    <textarea name="{{ $name }}" class="form-control" placeholder="Masukan {{ $label }}...">{{ $value }}</textarea>
</div>
