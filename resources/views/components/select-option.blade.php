@props(['disabled' => false, 'selectedItem' => '', 'key', 'value'])

<option {{ $disabled ? 'disabled' : '' }}
        @selected($selectedItem == $key)
        {{ $attributes->merge(['class' => 'p-2 block text-sm text-gray-700']) }}
        value="{{ $key}}">
        {{ $value}}
</option>