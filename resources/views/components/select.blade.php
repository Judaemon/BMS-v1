@props(['disabled' => false, 'options' => [], 'selectedItem' => ''])

@php
    $disabledOption = $selectedItem == null ? false : true;
    //  @disabled($selectedItem == null ? true : false)
@endphp

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600']) !!}>
        <x-select-option disabled='{{ $disabledOption }}' key='null' value='Select option'></x-select-option>

    @foreach($options as $key => $value)
        <x-select-option selectedItem='{{ $selectedItem }}' key='{{ $key }}' value='{{ $value }}'></x-select-option>
    @endforeach
</select>

