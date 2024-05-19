@props(['label', 'name', 'data' => [], 'value' => '', 'disabled' => '', 'class' => ''])

<div class="col-12">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select name="{{ $name }}" class="form-control {{ $class }}">
        <option selected value="">-- Pilih {{ $label }} --</option>
        @foreach ($data as $index => $item)
            @php
                $item = (object) $item;
            @endphp
            <option value="{{ $item->value }}" {{ $item->value == $value ? 'selected' : '' }}>{{ $item->label }}</option>
        @endforeach
    </select>
</div>
